@php
    $serviceData = $data ?? null;
    $itemRows = function ($field, $blank = []) use ($serviceData) {
        $value = old($field, $serviceData ? $serviceData->{$field} : []);
        if (!is_array($value) || count($value) === 0) {
            $value = [$blank];
        }
        return array_values($value);
    };

    $checksText = function ($row) {
        $checks = $row['checks'] ?? '';
        return is_array($checks) ? implode("\n", $checks) : $checks;
    };

    $imagePreview = function ($path, $width = 200) {
        if (!$path) {
            return '';
        }
        $assetPath = asset($path);
        if (preg_match('/\.(jpeg|jpg|png|gif|webp)$/i', $assetPath)) {
            return '<img src="'.$assetPath.'" width="'.$width.'" class="mt-2 img-thumbnail">';
        }
        return '<video width="'.$width.'" height="160" class="mt-2" controls><source src="'.$assetPath.'" type="video/mp4"></video>';
    };

    $heroTags = $itemRows('detail_hero_tags', ['icon_class' => 'fas fa-check-circle', 'text' => '']);
    $heroStats = $itemRows('detail_hero_stats', ['icon_class' => 'fas fa-house-medical', 'text' => '']);
    $trustItems = $itemRows('detail_trust_items', ['icon_class' => 'fas fa-lock', 'text' => '']);
    $featureItems = $itemRows('detail_feature_items', ['icon_class' => 'fas fa-star', 'title' => '', 'description' => '']);
    $recommendedPlanItems = $itemRows('detail_recommended_plan_items', ['icon_class' => 'fas fa-file-alt', 'title' => '', 'highlight' => '']);
    $policyTypes = $itemRows('detail_policy_types', ['title' => '', 'description' => '', 'best_for' => '']);
    $howSteps = $itemRows('detail_how_it_works_steps', ['icon_class' => 'fas fa-shield-alt', 'title' => '', 'description' => '', 'checks' => '']);
    $benefits = $itemRows('detail_benefits', ['icon_class' => 'fas fa-hospital', 'title' => '', 'description' => '', 'badge' => '']);
    $buyingGuideItems = $itemRows('detail_buying_guide_items', ['title' => '', 'description' => '']);
    $claimProcesses = $itemRows('detail_claim_processes', ['type' => 'Cashless Claim', 'icon_class' => 'fas fa-hospital', 'title' => '', 'description' => '']);
    $testimonials = $itemRows('detail_testimonials', ['name' => '', 'handle' => '', 'rating' => '5', 'message' => '', 'date' => '']);
    $trustStats = $itemRows('detail_trust_stats', ['value' => '', 'label' => '']);
    $faqs = $itemRows('detail_faqs', ['question' => '', 'answer' => '']);
@endphp

<style>
    .policy-admin-card {
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        margin-bottom: 18px;
    }
    .policy-admin-card .card-header {
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
        padding: 10px 14px;
    }
    .policy-admin-card .card-header h4 {
        font-size: 15px;
        font-weight: 700;
        margin: 0;
    }
    .repeatable-row {
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 10px;
        background: #fff;
    }
    .repeatable-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 6px;
    }
</style>

<div class="policy-admin-card card">
    <div class="card-header"><h4>Basic Policy Information</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label("Title") !!}
                    {!! Form::text("name", null, ["class" => "form-control", "required" => "required"]) !!}
                    <span class="text-danger">{{ $errors->first("name") }}</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label("Seo Url") !!}
                    {!! Form::text("seo_url", null, ["class" => "form-control", "required" => "required"]) !!}
                    <span class="text-danger">{{ $errors->first("seo_url") }}</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label("Icon Class Name") !!}
                    {!! Form::text("icon_class", null, ["class" => "form-control", "placeholder" => "fas fa-shield-alt"]) !!}
                    <span class="text-danger">{{ $errors->first("icon_class") }}</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label("publish") !!}
                    {!! Form::select("publish", ["published" => "published", "pending" => "pending"], "published", ["class" => "form-control", "required" => "required"]) !!}
                    <span class="text-danger">{{ $errors->first("publish") }}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Image") !!}
                    {!! Form::file("image", ["class" => "form-control"]) !!}
                    <span class="text-danger">{{ $errors->first("image") }}</span>
                    @isset($data)
                        {!! $imagePreview($data->image) !!}
                    @endisset
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("Banner Image") !!}
                    {!! Form::file("bannerImage", ["class" => "form-control"]) !!}
                    <span class="text-danger">{{ $errors->first("bannerImage") }}</span>
                    @isset($data)
                        {!! $imagePreview($data->bannerImage) !!}
                    @endisset
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Short Card Description") !!}
                    {!! Form::textarea("description", null, ["class" => "form-control", "rows" => "2"]) !!}
                    <span class="text-danger">{{ $errors->first("description") }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Existing Short Description / Legacy Content") !!}
                    {!! Form::textarea("shortDescription", null, ["class" => "form-control", "rows" => "3"]) !!}
                    <span class="text-danger">{{ $errors->first("shortDescription") }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>Policy Detail Hero</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_hero_title", "Hero Title") !!}
                    {!! Form::textarea("detail_hero_title", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_hero_subtitle", "Hero Supporting Text") !!}
                    {!! Form::textarea("detail_hero_subtitle", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="js-repeatable" data-field="detail_hero_tags">
                    <label>Hero Tags</label>
                    <div class="js-repeatable-list">
                        @foreach($heroTags as $i => $row)
                            <div class="repeatable-row js-repeatable-row">
                                <input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_hero_tags[{{ $i }}][icon_class]" data-name="detail_hero_tags[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}">
                                <input type="text" class="form-control" placeholder="Tag text" name="detail_hero_tags[{{ $i }}][text]" data-name="detail_hero_tags[__INDEX__][text]" value="{{ $row['text'] ?? '' }}">
                                <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Tag</button>
                    <template class="js-repeatable-template">
                        <div class="repeatable-row js-repeatable-row">
                            <input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_hero_tags[__INDEX__][icon_class]">
                            <input type="text" class="form-control" placeholder="Tag text" data-name="detail_hero_tags[__INDEX__][text]">
                            <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="col-md-4">
                <div class="js-repeatable" data-field="detail_hero_stats">
                    <label>Hero Stat Items</label>
                    <div class="js-repeatable-list">
                        @foreach($heroStats as $i => $row)
                            <div class="repeatable-row js-repeatable-row">
                                <input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_hero_stats[{{ $i }}][icon_class]" data-name="detail_hero_stats[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}">
                                <input type="text" class="form-control" placeholder="Text" name="detail_hero_stats[{{ $i }}][text]" data-name="detail_hero_stats[__INDEX__][text]" value="{{ $row['text'] ?? '' }}">
                                <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Stat</button>
                    <template class="js-repeatable-template">
                        <div class="repeatable-row js-repeatable-row">
                            <input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_hero_stats[__INDEX__][icon_class]">
                            <input type="text" class="form-control" placeholder="Text" data-name="detail_hero_stats[__INDEX__][text]">
                            <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="col-md-4">
                <div class="js-repeatable" data-field="detail_trust_items">
                    <label>Trust Strip Items</label>
                    <div class="js-repeatable-list">
                        @foreach($trustItems as $i => $row)
                            <div class="repeatable-row js-repeatable-row">
                                <input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_trust_items[{{ $i }}][icon_class]" data-name="detail_trust_items[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}">
                                <input type="text" class="form-control" placeholder="Text" name="detail_trust_items[{{ $i }}][text]" data-name="detail_trust_items[__INDEX__][text]" value="{{ $row['text'] ?? '' }}">
                                <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Trust Item</button>
                    <template class="js-repeatable-template">
                        <div class="repeatable-row js-repeatable-row">
                            <input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_trust_items[__INDEX__][icon_class]">
                            <input type="text" class="form-control" placeholder="Text" data-name="detail_trust_items[__INDEX__][text]">
                            <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>Highlights, Overview, Policy Types</h4></div>
    <div class="card-body">
        <div class="form-group">
            {!! Form::label("detail_feature_intro", "Feature Section Intro") !!}
            {!! Form::textarea("detail_feature_intro", null, ["class" => "form-control", "rows" => "3"]) !!}
        </div>

        <div class="js-repeatable mb-3" data-field="detail_feature_items">
            <label>Feature Items</label>
            <div class="js-repeatable-list">
                @foreach($featureItems as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row">
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="Icon class" name="detail_feature_items[{{ $i }}][icon_class]" data-name="detail_feature_items[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}"></div>
                            <div class="col-md-3"><input type="text" class="form-control" placeholder="Title" name="detail_feature_items[{{ $i }}][title]" data-name="detail_feature_items[__INDEX__][title]" value="{{ $row['title'] ?? '' }}"></div>
                            <div class="col-md-6"><input type="text" class="form-control" placeholder="Description" name="detail_feature_items[{{ $i }}][description]" data-name="detail_feature_items[__INDEX__][description]" value="{{ $row['description'] ?? '' }}"></div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Feature</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row">
                        <div class="col-md-3"><input type="text" class="form-control" placeholder="Icon class" data-name="detail_feature_items[__INDEX__][icon_class]"></div>
                        <div class="col-md-3"><input type="text" class="form-control" placeholder="Title" data-name="detail_feature_items[__INDEX__][title]"></div>
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Description" data-name="detail_feature_items[__INDEX__][description]"></div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <hr>

        <h5 class="mb-3">Recommended Plans Section</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label("detail_recommended_plan_label", "Eyebrow / Label") !!}
                    {!! Form::text("detail_recommended_plan_label", null, ["class" => "form-control", "placeholder" => "Key Features"]) !!}
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    {!! Form::label("detail_recommended_plan_title", "Section Title") !!}
                    {!! Form::textarea("detail_recommended_plan_title", null, ["class" => "form-control", "rows" => "2", "placeholder" => "Recommended <em>Car Insurance</em> Plans"]) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("detail_recommended_plan_description", "Section Description") !!}
                    {!! Form::textarea("detail_recommended_plan_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
        </div>

        <div class="js-repeatable mb-3" data-field="detail_recommended_plan_items">
            <label>Recommended Plan Items</label>
            <div class="js-repeatable-list">
                @foreach($recommendedPlanItems as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row align-items-center">
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_recommended_plan_items[{{ $i }}][icon_class]" data-name="detail_recommended_plan_items[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}"></div>
                            <div class="col-md-6"><input type="text" class="form-control mb-2" placeholder="Plan title" name="detail_recommended_plan_items[{{ $i }}][title]" data-name="detail_recommended_plan_items[__INDEX__][title]" value="{{ $row['title'] ?? '' }}"></div>
                            <div class="col-md-3">
                                <label class="mb-2 d-block">Highlight</label>
                                <input type="checkbox" value="1" name="detail_recommended_plan_items[{{ $i }}][highlight]" data-name="detail_recommended_plan_items[__INDEX__][highlight]" {{ !empty($row['highlight']) ? 'checked' : '' }}> Featured item
                            </div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Recommended Item</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row align-items-center">
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_recommended_plan_items[__INDEX__][icon_class]"></div>
                        <div class="col-md-6"><input type="text" class="form-control mb-2" placeholder="Plan title" data-name="detail_recommended_plan_items[__INDEX__][title]"></div>
                        <div class="col-md-3">
                            <label class="mb-2 d-block">Highlight</label>
                            <input type="checkbox" value="1" data-name="detail_recommended_plan_items[__INDEX__][highlight]"> Featured item
                        </div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <div class="form-group">
            {!! Form::label("detail_overview_content", "Policy Overview Content") !!}
            {!! Form::textarea("detail_overview_content", null, ["class" => "form-control", "rows" => "4"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("detail_policy_types_intro", "Policy Types Intro") !!}
            {!! Form::textarea("detail_policy_types_intro", null, ["class" => "form-control", "rows" => "2"]) !!}
        </div>

        <div class="js-repeatable mb-3" data-field="detail_policy_types">
            <label>Policy Types</label>
            <div class="js-repeatable-list">
                @foreach($policyTypes as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <input type="text" class="form-control mb-2" placeholder="Type title" name="detail_policy_types[{{ $i }}][title]" data-name="detail_policy_types[__INDEX__][title]" value="{{ $row['title'] ?? '' }}">
                        <textarea class="form-control mb-2" rows="2" placeholder="Description" name="detail_policy_types[{{ $i }}][description]" data-name="detail_policy_types[__INDEX__][description]">{{ $row['description'] ?? '' }}</textarea>
                        <input type="text" class="form-control" placeholder="Best for" name="detail_policy_types[{{ $i }}][best_for]" data-name="detail_policy_types[__INDEX__][best_for]" value="{{ $row['best_for'] ?? '' }}">
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Policy Type</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <input type="text" class="form-control mb-2" placeholder="Type title" data-name="detail_policy_types[__INDEX__][title]">
                    <textarea class="form-control mb-2" rows="2" placeholder="Description" data-name="detail_policy_types[__INDEX__][description]"></textarea>
                    <input type="text" class="form-control" placeholder="Best for" data-name="detail_policy_types[__INDEX__][best_for]">
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <div class="form-group">
            {!! Form::label("detail_insurer_intro", "Top Insurers Intro") !!}
            {!! Form::textarea("detail_insurer_intro", null, ["class" => "form-control", "rows" => "2"]) !!}
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>How It Works</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_how_it_works_title", "Title") !!}
                    {!! Form::text("detail_how_it_works_title", null, ["class" => "form-control"]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_how_it_works_description", "Description") !!}
                    {!! Form::textarea("detail_how_it_works_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
        </div>

        <div class="js-repeatable" data-field="detail_how_it_works_steps">
            <label>Steps</label>
            <div class="js-repeatable-list">
                @foreach($howSteps as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row">
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_how_it_works_steps[{{ $i }}][icon_class]" data-name="detail_how_it_works_steps[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}"></div>
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Title" name="detail_how_it_works_steps[{{ $i }}][title]" data-name="detail_how_it_works_steps[__INDEX__][title]" value="{{ $row['title'] ?? '' }}"></div>
                            <div class="col-md-3"><textarea class="form-control mb-2" rows="2" placeholder="Description" name="detail_how_it_works_steps[{{ $i }}][description]" data-name="detail_how_it_works_steps[__INDEX__][description]">{{ $row['description'] ?? '' }}</textarea></div>
                            <div class="col-md-3"><textarea class="form-control mb-2" rows="2" placeholder="Checklist, one per line" name="detail_how_it_works_steps[{{ $i }}][checks]" data-name="detail_how_it_works_steps[__INDEX__][checks]">{{ $checksText($row) }}</textarea></div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Step</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row">
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_how_it_works_steps[__INDEX__][icon_class]"></div>
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Title" data-name="detail_how_it_works_steps[__INDEX__][title]"></div>
                        <div class="col-md-3"><textarea class="form-control mb-2" rows="2" placeholder="Description" data-name="detail_how_it_works_steps[__INDEX__][description]"></textarea></div>
                        <div class="col-md-3"><textarea class="form-control mb-2" rows="2" placeholder="Checklist, one per line" data-name="detail_how_it_works_steps[__INDEX__][checks]"></textarea></div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>Benefits and Buying Guide</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_benefits_title", "Benefits Title") !!}
                    {!! Form::text("detail_benefits_title", null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("detail_benefits_description", "Benefits Description") !!}
                    {!! Form::textarea("detail_benefits_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_buying_guide_title", "Buying Guide Title") !!}
                    {!! Form::text("detail_buying_guide_title", null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("detail_buying_guide_description", "Buying Guide Description") !!}
                    {!! Form::textarea("detail_buying_guide_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
        </div>

        <div class="js-repeatable mb-3" data-field="detail_benefits">
            <label>Benefits</label>
            <div class="js-repeatable-list">
                @foreach($benefits as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row">
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_benefits[{{ $i }}][icon_class]" data-name="detail_benefits[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}"></div>
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Title" name="detail_benefits[{{ $i }}][title]" data-name="detail_benefits[__INDEX__][title]" value="{{ $row['title'] ?? '' }}"></div>
                            <div class="col-md-4"><input type="text" class="form-control mb-2" placeholder="Description" name="detail_benefits[{{ $i }}][description]" data-name="detail_benefits[__INDEX__][description]" value="{{ $row['description'] ?? '' }}"></div>
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Badge" name="detail_benefits[{{ $i }}][badge]" data-name="detail_benefits[__INDEX__][badge]" value="{{ $row['badge'] ?? '' }}"></div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Benefit</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row">
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_benefits[__INDEX__][icon_class]"></div>
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Title" data-name="detail_benefits[__INDEX__][title]"></div>
                        <div class="col-md-4"><input type="text" class="form-control mb-2" placeholder="Description" data-name="detail_benefits[__INDEX__][description]"></div>
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Badge" data-name="detail_benefits[__INDEX__][badge]"></div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <div class="js-repeatable" data-field="detail_buying_guide_items">
            <label>Buying Guide Items</label>
            <div class="js-repeatable-list">
                @foreach($buyingGuideItems as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <input type="text" class="form-control mb-2" placeholder="Title" name="detail_buying_guide_items[{{ $i }}][title]" data-name="detail_buying_guide_items[__INDEX__][title]" value="{{ $row['title'] ?? '' }}">
                        <textarea class="form-control" rows="2" placeholder="Description" name="detail_buying_guide_items[{{ $i }}][description]" data-name="detail_buying_guide_items[__INDEX__][description]">{{ $row['description'] ?? '' }}</textarea>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Guide Item</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <input type="text" class="form-control mb-2" placeholder="Title" data-name="detail_buying_guide_items[__INDEX__][title]">
                    <textarea class="form-control" rows="2" placeholder="Description" data-name="detail_buying_guide_items[__INDEX__][description]"></textarea>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>Claims, Testimonials, FAQs</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_claims_title", "Claims Title") !!}
                    {!! Form::text("detail_claims_title", null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("detail_claims_description", "Claims Description") !!}
                    {!! Form::textarea("detail_claims_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("detail_testimonial_title", "Testimonials Title") !!}
                    {!! Form::text("detail_testimonial_title", null, ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("detail_testimonial_description", "Testimonials Description") !!}
                    {!! Form::textarea("detail_testimonial_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                </div>
            </div>
        </div>

        <div class="js-repeatable mb-3" data-field="detail_claim_processes">
            <label>Claim Process Steps</label>
            <div class="js-repeatable-list">
                @foreach($claimProcesses as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row">
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Claim type" name="detail_claim_processes[{{ $i }}][type]" data-name="detail_claim_processes[__INDEX__][type]" value="{{ $row['type'] ?? '' }}"></div>
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Icon class" name="detail_claim_processes[{{ $i }}][icon_class]" data-name="detail_claim_processes[__INDEX__][icon_class]" value="{{ $row['icon_class'] ?? '' }}"></div>
                            <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Step title" name="detail_claim_processes[{{ $i }}][title]" data-name="detail_claim_processes[__INDEX__][title]" value="{{ $row['title'] ?? '' }}"></div>
                            <div class="col-md-5"><input type="text" class="form-control mb-2" placeholder="Description" name="detail_claim_processes[{{ $i }}][description]" data-name="detail_claim_processes[__INDEX__][description]" value="{{ $row['description'] ?? '' }}"></div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Claim Step</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row">
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Claim type" data-name="detail_claim_processes[__INDEX__][type]"></div>
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Icon class" data-name="detail_claim_processes[__INDEX__][icon_class]"></div>
                        <div class="col-md-3"><input type="text" class="form-control mb-2" placeholder="Step title" data-name="detail_claim_processes[__INDEX__][title]"></div>
                        <div class="col-md-5"><input type="text" class="form-control mb-2" placeholder="Description" data-name="detail_claim_processes[__INDEX__][description]"></div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <div class="js-repeatable mb-3" data-field="detail_testimonials">
            <label>Testimonials</label>
            <div class="js-repeatable-list">
                @foreach($testimonials as $i => $row)
                    <div class="repeatable-row js-repeatable-row">
                        <div class="row">
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Name" name="detail_testimonials[{{ $i }}][name]" data-name="detail_testimonials[__INDEX__][name]" value="{{ $row['name'] ?? '' }}"></div>
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Handle" name="detail_testimonials[{{ $i }}][handle]" data-name="detail_testimonials[__INDEX__][handle]" value="{{ $row['handle'] ?? '' }}"></div>
                            <div class="col-md-1"><input type="number" min="1" max="5" class="form-control mb-2" placeholder="5" name="detail_testimonials[{{ $i }}][rating]" data-name="detail_testimonials[__INDEX__][rating]" value="{{ $row['rating'] ?? '' }}"></div>
                            <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Date" name="detail_testimonials[{{ $i }}][date]" data-name="detail_testimonials[__INDEX__][date]" value="{{ $row['date'] ?? '' }}"></div>
                            <div class="col-md-5"><input type="text" class="form-control mb-2" placeholder="Message" name="detail_testimonials[{{ $i }}][message]" data-name="detail_testimonials[__INDEX__][message]" value="{{ $row['message'] ?? '' }}"></div>
                        </div>
                        <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Testimonial</button>
            <template class="js-repeatable-template">
                <div class="repeatable-row js-repeatable-row">
                    <div class="row">
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Name" data-name="detail_testimonials[__INDEX__][name]"></div>
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Handle" data-name="detail_testimonials[__INDEX__][handle]"></div>
                        <div class="col-md-1"><input type="number" min="1" max="5" class="form-control mb-2" placeholder="5" data-name="detail_testimonials[__INDEX__][rating]"></div>
                        <div class="col-md-2"><input type="text" class="form-control mb-2" placeholder="Date" data-name="detail_testimonials[__INDEX__][date]"></div>
                        <div class="col-md-5"><input type="text" class="form-control mb-2" placeholder="Message" data-name="detail_testimonials[__INDEX__][message]"></div>
                    </div>
                    <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                </div>
            </template>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="js-repeatable mb-3" data-field="detail_trust_stats">
                    <label>Trust Stats</label>
                    <div class="js-repeatable-list">
                        @foreach($trustStats as $i => $row)
                            <div class="repeatable-row js-repeatable-row">
                                <input type="text" class="form-control mb-2" placeholder="Value" name="detail_trust_stats[{{ $i }}][value]" data-name="detail_trust_stats[__INDEX__][value]" value="{{ $row['value'] ?? '' }}">
                                <input type="text" class="form-control" placeholder="Label" name="detail_trust_stats[{{ $i }}][label]" data-name="detail_trust_stats[__INDEX__][label]" value="{{ $row['label'] ?? '' }}">
                                <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add Stat</button>
                    <template class="js-repeatable-template">
                        <div class="repeatable-row js-repeatable-row">
                            <input type="text" class="form-control mb-2" placeholder="Value" data-name="detail_trust_stats[__INDEX__][value]">
                            <input type="text" class="form-control" placeholder="Label" data-name="detail_trust_stats[__INDEX__][label]">
                            <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="col-md-6">
                <div class="js-repeatable mb-3" data-field="detail_faqs">
                    <label>FAQs</label>
                    <div class="js-repeatable-list">
                        @foreach($faqs as $i => $row)
                            <div class="repeatable-row js-repeatable-row">
                                <input type="text" class="form-control mb-2" placeholder="Question" name="detail_faqs[{{ $i }}][question]" data-name="detail_faqs[__INDEX__][question]" value="{{ $row['question'] ?? '' }}">
                                <textarea class="form-control" rows="2" placeholder="Answer" name="detail_faqs[{{ $i }}][answer]" data-name="detail_faqs[__INDEX__][answer]">{{ $row['answer'] ?? '' }}</textarea>
                                <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm js-repeatable-add">Add FAQ</button>
                    <template class="js-repeatable-template">
                        <div class="repeatable-row js-repeatable-row">
                            <input type="text" class="form-control mb-2" placeholder="Question" data-name="detail_faqs[__INDEX__][question]">
                            <textarea class="form-control" rows="2" placeholder="Answer" data-name="detail_faqs[__INDEX__][answer]"></textarea>
                            <div class="repeatable-actions"><button type="button" class="btn btn-outline-danger btn-sm js-repeatable-remove">Remove</button></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label("detail_final_content", "Final Policy Detail Content") !!}
            {!! Form::textarea("detail_final_content", null, ["class" => "form-control", "rows" => "4"]) !!}
        </div>
    </div>
</div>

<div class="policy-admin-card card">
    <div class="card-header"><h4>SEO</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("meta_title") !!}
                    {!! Form::textarea("meta_title", null, ["class" => "form-control", "rows" => "2"]) !!}
                    <span class="text-danger">{{ $errors->first("meta_title") }}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label("meta_keywords") !!}
                    {!! Form::textarea("meta_keywords", null, ["class" => "form-control", "rows" => "2"]) !!}
                    <span class="text-danger">{{ $errors->first("meta_keywords") }}</span>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("meta_description") !!}
                    {!! Form::textarea("meta_description", null, ["class" => "form-control", "rows" => "2"]) !!}
                    <span class="text-danger">{{ $errors->first("meta_description") }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        function refreshRepeatable(group) {
            group.querySelectorAll('.js-repeatable-row').forEach(function (row, index) {
                row.querySelectorAll('[data-name]').forEach(function (field) {
                    field.name = field.getAttribute('data-name').replace('__INDEX__', index);
                });
            });
        }

        document.addEventListener('click', function (event) {
            var addButton = event.target.closest('.js-repeatable-add');

            if (addButton) {
                var group = addButton.closest('.js-repeatable');
                var template = group ? group.querySelector('.js-repeatable-template') : null;
                var list = group ? group.querySelector('.js-repeatable-list') : null;

                if (template && list) {
                    list.insertAdjacentHTML('beforeend', template.innerHTML);
                    refreshRepeatable(group);
                }

                return;
            }

            var removeButton = event.target.closest('.js-repeatable-remove');

            if (removeButton) {
                var removeGroup = removeButton.closest('.js-repeatable');
                var row = removeButton.closest('.js-repeatable-row');
                var rows = removeGroup ? removeGroup.querySelectorAll('.js-repeatable-row') : [];

                if (!removeGroup || !row) {
                    return;
                }

                if (rows.length > 1) {
                    row.remove();
                } else {
                    row.querySelectorAll('input, textarea, select').forEach(function (field) {
                        if (field.type === 'checkbox' || field.type === 'radio') {
                            field.checked = false;
                        } else {
                            field.value = '';
                        }
                    });
                }

                refreshRepeatable(removeGroup);
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.js-repeatable').forEach(function (group) {
                refreshRepeatable(group);
            });
        });
    })();
</script>
