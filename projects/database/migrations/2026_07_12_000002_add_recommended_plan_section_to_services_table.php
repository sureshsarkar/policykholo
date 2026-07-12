<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->text('detail_recommended_plan_label')->nullable()->after('detail_feature_items');
            $table->longText('detail_recommended_plan_title')->nullable()->after('detail_recommended_plan_label');
            $table->longText('detail_recommended_plan_description')->nullable()->after('detail_recommended_plan_title');
            $table->longText('detail_recommended_plan_items')->nullable()->after('detail_recommended_plan_description');
        });

        DB::table('services')->select('id', 'name')->orderBy('id')->chunkById(100, function ($services) {
            foreach ($services as $service) {
                $name = $service->name ?: 'Insurance';

                DB::table('services')->where('id', $service->id)->update([
                    'detail_recommended_plan_label' => 'Key Features',
                    'detail_recommended_plan_title' => "Recommended <em>{$name}</em> Plans",
                    'detail_recommended_plan_description' => "We shortlist the top {$name} plans based on coverage, claim support, premium value, and overall benefits, so you can compare options with confidence.",
                    'detail_recommended_plan_items' => json_encode([
                        ['icon_class' => 'fas fa-file-alt', 'title' => 'Best Value Plan', 'highlight' => '1'],
                        ['icon_class' => 'fas fa-capsules', 'title' => 'Most Comprehensive Plan', 'highlight' => ''],
                        ['icon_class' => 'fas fa-shield-alt', 'title' => 'Strong Protection Plan', 'highlight' => ''],
                        ['icon_class' => 'fas fa-chart-line', 'title' => 'Long-term Value Plan', 'highlight' => ''],
                    ]),
                ]);
            }
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'detail_recommended_plan_label',
                'detail_recommended_plan_title',
                'detail_recommended_plan_description',
                'detail_recommended_plan_items',
            ]);
        });
    }
};
