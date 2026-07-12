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
            $table->text('detail_hero_title')->nullable()->after('header_section');
            $table->longText('detail_hero_subtitle')->nullable()->after('detail_hero_title');
            $table->longText('detail_hero_tags')->nullable()->after('detail_hero_subtitle');
            $table->longText('detail_hero_stats')->nullable()->after('detail_hero_tags');
            $table->longText('detail_trust_items')->nullable()->after('detail_hero_stats');
            $table->longText('detail_feature_intro')->nullable()->after('detail_trust_items');
            $table->longText('detail_feature_items')->nullable()->after('detail_feature_intro');
            $table->longText('detail_overview_content')->nullable()->after('detail_feature_items');
            $table->longText('detail_policy_types_intro')->nullable()->after('detail_overview_content');
            $table->longText('detail_policy_types')->nullable()->after('detail_policy_types_intro');
            $table->longText('detail_insurer_intro')->nullable()->after('detail_policy_types');
            $table->text('detail_how_it_works_title')->nullable()->after('detail_insurer_intro');
            $table->longText('detail_how_it_works_description')->nullable()->after('detail_how_it_works_title');
            $table->longText('detail_how_it_works_steps')->nullable()->after('detail_how_it_works_description');
            $table->text('detail_benefits_title')->nullable()->after('detail_how_it_works_steps');
            $table->longText('detail_benefits_description')->nullable()->after('detail_benefits_title');
            $table->longText('detail_benefits')->nullable()->after('detail_benefits_description');
            $table->text('detail_buying_guide_title')->nullable()->after('detail_benefits');
            $table->longText('detail_buying_guide_description')->nullable()->after('detail_buying_guide_title');
            $table->longText('detail_buying_guide_items')->nullable()->after('detail_buying_guide_description');
            $table->text('detail_claims_title')->nullable()->after('detail_buying_guide_items');
            $table->longText('detail_claims_description')->nullable()->after('detail_claims_title');
            $table->longText('detail_claim_processes')->nullable()->after('detail_claims_description');
            $table->text('detail_testimonial_title')->nullable()->after('detail_claim_processes');
            $table->longText('detail_testimonial_description')->nullable()->after('detail_testimonial_title');
            $table->longText('detail_testimonials')->nullable()->after('detail_testimonial_description');
            $table->longText('detail_trust_stats')->nullable()->after('detail_testimonials');
            $table->longText('detail_faqs')->nullable()->after('detail_trust_stats');
            $table->longText('detail_final_content')->nullable()->after('detail_faqs');
        });

        DB::table('services')->select('id', 'name', 'description', 'shortDescription')->orderBy('id')->chunkById(100, function ($services) {
            foreach ($services as $service) {
                $name = $service->name ?: 'Insurance';

                DB::table('services')->where('id', $service->id)->update([
                    'detail_hero_title' => "Compare the Best {$name} Plans in India in 60 Seconds",
                    'detail_hero_subtitle' => $service->description,
                    'detail_hero_tags' => json_encode([
                        ['icon_class' => 'fas fa-check-circle', 'text' => "Compare trusted {$name} options"],
                        ['icon_class' => 'fas fa-shield-alt', 'text' => 'Transparent premiums and benefits'],
                        ['icon_class' => 'fas fa-clock', 'text' => 'Quick expert guidance'],
                    ]),
                    'detail_hero_stats' => json_encode([
                        ['icon_class' => 'fas fa-house-medical', 'text' => 'IRDAI-approved insurers'],
                        ['icon_class' => 'fas fa-book-open-reader', 'text' => 'Easy comparison support'],
                        ['icon_class' => 'far fa-newspaper', 'text' => 'No spam calls'],
                    ]),
                    'detail_trust_items' => json_encode([
                        ['icon_class' => 'fas fa-lock', 'text' => '100% secure and safe'],
                        ['icon_class' => 'fas fa-headset', 'text' => 'Customer support'],
                        ['icon_class' => 'fas fa-bolt', 'text' => 'Fast policy assistance'],
                        ['icon_class' => 'fas fa-hospital', 'text' => 'Partner insurer network'],
                    ]),
                    'detail_feature_intro' => "<h2 class=\"sec-h mb-3\">Features of <em>{$name}</em></h2>",
                    'detail_feature_items' => json_encode([
                        ['icon_class' => 'fas fa-star', 'title' => 'Best Value Plan', 'description' => 'Balanced coverage and premium for everyday protection.'],
                        ['icon_class' => 'fas fa-shield-halved', 'title' => 'Comprehensive Plan', 'description' => 'Broader protection for stronger financial security.'],
                        ['icon_class' => 'fas fa-indian-rupee-sign', 'title' => 'Affordable Premium', 'description' => 'Options designed around your budget and needs.'],
                        ['icon_class' => 'fas fa-chart-line', 'title' => 'Long-term Value', 'description' => 'Useful benefits for renewals, claims, and continuity.'],
                    ]),
                    'detail_overview_content' => "<p>{$name} helps protect you from unexpected financial stress by giving you structured coverage for eligible risks, claims, and policy benefits.</p><p>Compare plans carefully by coverage, premium, exclusions, claims support, and insurer reliability before choosing the right option.</p>",
                    'detail_policy_types_intro' => 'Choose the right type of plan based on your needs, family size, and coverage goals.',
                    'detail_policy_types' => json_encode([
                        ['title' => "Individual {$name}", 'description' => 'Coverage designed for one person.', 'best_for' => 'Individuals who want dedicated protection.'],
                        ['title' => "Family {$name}", 'description' => 'Coverage options for multiple family members.', 'best_for' => 'Families looking for convenient protection.'],
                        ['title' => 'Senior Citizen Plan', 'description' => 'Plans designed around older age needs where applicable.', 'best_for' => 'Parents and senior family members.'],
                        ['title' => 'Group Plan', 'description' => 'Coverage usually offered through employers or organizations.', 'best_for' => 'Corporate or group coverage needs.'],
                    ]),
                    'detail_insurer_intro' => "Compare {$name} plans from trusted insurers based on benefits, premium, support, and claim experience.",
                    'detail_how_it_works_title' => 'Getting insured is simple and takes just a few minutes',
                    'detail_how_it_works_description' => 'Share basic details, compare suitable plans, and get expert help before you buy.',
                    'detail_how_it_works_steps' => json_encode([
                        ['icon_class' => 'fas fa-shield-alt', 'title' => 'Choose Your Cover', 'description' => 'Select the coverage type and amount that fits your needs.', 'checks' => ['Coverage type', 'Budget fit', 'Family needs']],
                        ['icon_class' => 'fas fa-clipboard-list', 'title' => 'Add Details', 'description' => 'Enter the basic information needed to compare plans.', 'checks' => ['Contact details', 'Coverage need', 'Advisor review']],
                        ['icon_class' => 'fas fa-magnifying-glass', 'title' => 'Compare Plans', 'description' => 'Review premiums, benefits, exclusions, and claim support.', 'checks' => ['Premium', 'Benefits', 'Claims support']],
                        ['icon_class' => 'fas fa-circle-check', 'title' => 'Buy With Confidence', 'description' => 'Proceed only after understanding the policy details clearly.', 'checks' => ['Final review', 'Secure payment', 'Policy document']],
                    ]),
                    'detail_benefits_title' => "Key Benefits of {$name}",
                    'detail_benefits_description' => 'A good plan protects more than one risk. Review the practical benefits before buying.',
                    'detail_benefits' => json_encode([
                        ['icon_class' => 'fas fa-hospital', 'title' => 'Strong Coverage', 'description' => 'Get financial protection for eligible policy events.', 'badge' => 'Core benefit'],
                        ['icon_class' => 'fas fa-file-contract', 'title' => 'Clear Policy Terms', 'description' => 'Understand inclusions, exclusions, and waiting periods before buying.', 'badge' => 'Transparent'],
                        ['icon_class' => 'fas fa-headset', 'title' => 'Advisor Support', 'description' => 'Get help comparing and shortlisting the right option.', 'badge' => 'Guided'],
                        ['icon_class' => 'fas fa-indian-rupee-sign', 'title' => 'Budget Friendly Options', 'description' => 'Compare plans across premium ranges.', 'badge' => 'Flexible'],
                    ]),
                    'detail_buying_guide_title' => "How to Choose the Right {$name} Plan",
                    'detail_buying_guide_description' => 'Follow these expert-backed checks before making a decision.',
                    'detail_buying_guide_items' => json_encode([
                        ['title' => 'Choose Adequate Coverage', 'description' => 'Pick a coverage amount that matches your city, lifestyle, family needs, and risk profile.'],
                        ['title' => 'Review Insurer Reliability', 'description' => 'Compare claim settlement experience, customer support, and policy servicing.'],
                        ['title' => 'Check Exclusions', 'description' => 'Read what is not covered so there are no surprises during a claim.'],
                        ['title' => 'Compare Premium and Benefits', 'description' => 'Do not choose only the cheapest plan. Compare value, not just price.'],
                    ]),
                    'detail_claims_title' => "{$name} Claims Process",
                    'detail_claims_description' => 'Filing a claim is simpler when you know the documents and steps.',
                    'detail_claim_processes' => json_encode([
                        ['type' => 'Cashless Claim', 'icon_class' => 'fas fa-hospital', 'title' => 'Visit Network Partner', 'description' => 'Use an eligible network provider where cashless support is available.'],
                        ['type' => 'Cashless Claim', 'icon_class' => 'fas fa-id-card', 'title' => 'Share Policy Details', 'description' => 'Provide policy and identity details for verification.'],
                        ['type' => 'Cashless Claim', 'icon_class' => 'fas fa-handshake', 'title' => 'Get Approval', 'description' => 'The insurer reviews and approves eligible claim requests.'],
                        ['type' => 'Reimbursement Claim', 'icon_class' => 'fas fa-hospital-user', 'title' => 'Get Treatment or Service', 'description' => 'Pay eligible expenses and keep all original documents.'],
                        ['type' => 'Reimbursement Claim', 'icon_class' => 'fas fa-file-invoice', 'title' => 'Submit Documents', 'description' => 'Submit bills, forms, and required supporting documents.'],
                        ['type' => 'Reimbursement Claim', 'icon_class' => 'fas fa-money-bill-transfer', 'title' => 'Receive Settlement', 'description' => 'Approved claim amount is credited as per policy terms.'],
                    ]),
                    'detail_testimonial_title' => 'Trusted by Happy Families',
                    'detail_testimonial_description' => 'Real experiences from people who chose guided insurance advice.',
                    'detail_testimonials' => json_encode([
                        ['name' => 'Policy Kholo Customer', 'handle' => '@policykholo', 'rating' => 5, 'message' => 'The team explained the policy clearly and helped me compare plans without pressure.', 'date' => 'Recently'],
                        ['name' => 'Happy Customer', 'handle' => '@customer', 'rating' => 5, 'message' => 'Simple process, clear advice, and quick support from start to finish.', 'date' => 'Recently'],
                    ]),
                    'detail_trust_stats' => json_encode([
                        ['value' => '1,00,000+', 'label' => 'Happy Customers'],
                        ['value' => '4.8/5', 'label' => 'Average Rating'],
                        ['value' => '98.5%', 'label' => 'Claim Support Focus'],
                        ['value' => '30+', 'label' => 'Insurer Partners'],
                    ]),
                    'detail_faqs' => json_encode([
                        ['question' => "What should I compare before buying {$name}?", 'answer' => 'Compare coverage, premium, exclusions, waiting periods, claim process, and insurer support before buying.'],
                        ['question' => "Can Policy Kholo help me choose {$name}?", 'answer' => 'Yes. Our team can help you understand plan options and choose coverage based on your needs.'],
                    ]),
                    'detail_final_content' => $service->shortDescription,
                ]);
            }
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'detail_hero_title',
                'detail_hero_subtitle',
                'detail_hero_tags',
                'detail_hero_stats',
                'detail_trust_items',
                'detail_feature_intro',
                'detail_feature_items',
                'detail_overview_content',
                'detail_policy_types_intro',
                'detail_policy_types',
                'detail_insurer_intro',
                'detail_how_it_works_title',
                'detail_how_it_works_description',
                'detail_how_it_works_steps',
                'detail_benefits_title',
                'detail_benefits_description',
                'detail_benefits',
                'detail_buying_guide_title',
                'detail_buying_guide_description',
                'detail_buying_guide_items',
                'detail_claims_title',
                'detail_claims_description',
                'detail_claim_processes',
                'detail_testimonial_title',
                'detail_testimonial_description',
                'detail_testimonials',
                'detail_trust_stats',
                'detail_faqs',
                'detail_final_content',
            ]);
        });
    }
};
