<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Helper\Upload;
use Validator;

class ServiceController extends Controller{

    public function __construct(Service $model){
        $this->model=$model;
        $this->admin_base_url="insurance-plan.index";
        $this->admin_view="admin.insurance-plan";
    }


    public function index(){
        $data=$this->model::with('pageType')->orderBy("id","desc")->get();
        return view($this->admin_view.".index",compact("data"));
    }


    public function create(){
        return view($this->admin_view.".create");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $data=$this->validatedData($request);
        if ($request->hasFile("image")) {
            $data['image'] = Upload::fileUpload($request->file("image"),"insurance-plan");
        }
        if ($request->hasFile("bannerImage")) {
            $data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"insurance-plan");
        }
        $this->model::create($data);
        return redirect()->route($this->admin_base_url)->with("success","Successfully Added");
    }


    public function show($id){
        return redirect()->route($this->admin_base_url);
    }


    public function edit($id){
        $data=$this->model::find($id);
        if($data){
            return view($this->admin_view.".edit",compact("data"));
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

  
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return redirect()->back()->withInput()->with("danger",$validator->errors()->first())->withErrors($validator->errors());
        }
        $exist=$this->model::find($id);
        if($exist){
            $data=$this->validatedData($request);
            if ($request->hasFile("image")) {
                $data['image'] = Upload::fileUpload($request->file("image"),"insurance-plan");
            }
            if ($request->hasFile("bannerImage")) {
                $data['bannerImage'] = Upload::fileUpload($request->file("bannerImage"),"insurance-plan");
            }
            $this->model::find($id)->update($data);
            return redirect()->route($this->admin_base_url)->with("success","Successfully Updated");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    public function destroy($id){
        $exist=$this->model::find($id);
        if($exist){
            $exist->delete();
            return redirect()->route($this->admin_base_url)->with("success","Successfully Deleted");
        }
        return redirect()->route($this->admin_base_url)->with("danger","Invalid Calling");
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'seo_url' => 'required|string|max:255',
            'publish' => 'required|string|max:255',
            'image' => 'nullable|file|max:204800',
            'bannerImage' => 'nullable|file|max:204800',
            'detail_hero_tags' => 'nullable|array',
            'detail_hero_stats' => 'nullable|array',
            'detail_trust_items' => 'nullable|array',
            'detail_feature_items' => 'nullable|array',
            'detail_recommended_plan_items' => 'nullable|array',
            'detail_policy_types' => 'nullable|array',
            'detail_how_it_works_steps' => 'nullable|array',
            'detail_benefits' => 'nullable|array',
            'detail_buying_guide_items' => 'nullable|array',
            'detail_claim_processes' => 'nullable|array',
            'detail_testimonials' => 'nullable|array',
            'detail_trust_stats' => 'nullable|array',
            'detail_faqs' => 'nullable|array',
        ];
    }

    protected function validatedData(Request $request)
    {
        $data = $request->except([
            '_token',
            '_method',
            'image',
            'bannerImage',
            'detail_hero_tags',
            'detail_hero_stats',
            'detail_trust_items',
            'detail_feature_items',
            'detail_recommended_plan_items',
            'detail_policy_types',
            'detail_how_it_works_steps',
            'detail_benefits',
            'detail_buying_guide_items',
            'detail_claim_processes',
            'detail_testimonials',
            'detail_trust_stats',
            'detail_faqs',
        ]);

        $data['detail_hero_tags'] = $this->cleanRows($request->input('detail_hero_tags', []), ['icon_class', 'text'], ['text']);
        $data['detail_hero_stats'] = $this->cleanRows($request->input('detail_hero_stats', []), ['icon_class', 'text'], ['text']);
        $data['detail_trust_items'] = $this->cleanRows($request->input('detail_trust_items', []), ['icon_class', 'text'], ['text']);
        $data['detail_feature_items'] = $this->cleanRows($request->input('detail_feature_items', []), ['icon_class', 'title', 'description'], ['title']);
        $data['detail_recommended_plan_items'] = $this->cleanRows($request->input('detail_recommended_plan_items', []), ['icon_class', 'title', 'highlight'], ['title']);
        $data['detail_policy_types'] = $this->cleanRows($request->input('detail_policy_types', []), ['title', 'description', 'best_for'], ['title']);
        $data['detail_how_it_works_steps'] = $this->cleanStepRows($request->input('detail_how_it_works_steps', []));
        $data['detail_benefits'] = $this->cleanRows($request->input('detail_benefits', []), ['icon_class', 'title', 'description', 'badge'], ['title']);
        $data['detail_buying_guide_items'] = $this->cleanRows($request->input('detail_buying_guide_items', []), ['title', 'description'], ['title']);
        $data['detail_claim_processes'] = $this->cleanRows($request->input('detail_claim_processes', []), ['type', 'icon_class', 'title', 'description'], ['type', 'title']);
        $data['detail_testimonials'] = $this->cleanRows($request->input('detail_testimonials', []), ['name', 'handle', 'rating', 'message', 'date'], ['name', 'message']);
        $data['detail_trust_stats'] = $this->cleanRows($request->input('detail_trust_stats', []), ['value', 'label'], ['value', 'label']);
        $data['detail_faqs'] = $this->cleanRows($request->input('detail_faqs', []), ['question', 'answer'], ['question']);

        return $data;
    }

    protected function cleanRows($rows, array $keys, array $requiredKeys = [])
    {
        if (!is_array($rows)) {
            return null;
        }

        $cleaned = [];
        foreach ($rows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $item = [];
            foreach ($keys as $key) {
                $item[$key] = trim((string)($row[$key] ?? ''));
            }

            $hasRequired = true;
            foreach ($requiredKeys as $key) {
                if (($item[$key] ?? '') === '') {
                    $hasRequired = false;
                    break;
                }
            }

            if ($hasRequired && count(array_filter($item, fn($value) => $value !== '')) > 0) {
                $cleaned[] = $item;
            }
        }

        return count($cleaned) ? array_values($cleaned) : null;
    }

    protected function cleanStepRows($rows)
    {
        if (!is_array($rows)) {
            return null;
        }

        $cleaned = [];
        foreach ($rows as $row) {
            if (!is_array($row) || trim((string)($row['title'] ?? '')) === '') {
                continue;
            }

            $cleaned[] = [
                'icon_class' => trim((string)($row['icon_class'] ?? '')),
                'title' => trim((string)($row['title'] ?? '')),
                'description' => trim((string)($row['description'] ?? '')),
                'checks' => $this->linesToArray($row['checks'] ?? ''),
            ];
        }

        return count($cleaned) ? array_values($cleaned) : null;
    }

    protected function linesToArray($value)
    {
        if (is_array($value)) {
            return array_values(array_filter(array_map('trim', $value)));
        }

        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string)$value))));
    }
}
