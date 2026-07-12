@extends('front.layouts.master')
@section('title', $data->meta_title)
@section('keywords', $data->meta_keywords)
@section('description', $data->meta_description)
@section('logo', $data->image)
@section('header-section')
    {!! $data->header_section !!}
@stop
@section('footer-section')
    {!! $data->footer_section !!}
@stop

@section('container')
@php
    $policyName = $insurance->name ?? 'Insurance';

    $cleanRows = function ($rows, $requiredKey = null) {
        return collect(is_array($rows) ? $rows : [])
            ->filter(function ($row) use ($requiredKey) {
                if (!is_array($row)) {
                    return false;
                }

                if ($requiredKey) {
                    return trim((string)($row[$requiredKey] ?? '')) !== '';
                }

                return collect($row)->filter(fn($value) => trim((string)$value) !== '')->isNotEmpty();
            })
            ->values();
    };

    $heroTitle = $insurance->detail_hero_title ?: "Compare the Best {$policyName} Plans in India";
    $heroSubtitle = $insurance->detail_hero_subtitle ?: $insurance->description;

    $heroTags = $cleanRows($insurance->detail_hero_tags, 'text');
    if ($heroTags->isEmpty()) {
        $heroTags = collect([
            ['icon_class' => 'fas fa-check-circle', 'text' => "Compare trusted {$policyName} options"],
            ['icon_class' => 'fas fa-shield-alt', 'text' => 'Transparent premiums and benefits'],
            ['icon_class' => 'fas fa-clock', 'text' => 'Quick expert guidance'],
        ]);
    }

    $heroStats = $cleanRows($insurance->detail_hero_stats, 'text');
    $trustItems = $cleanRows($insurance->detail_trust_items, 'text');
    $featureItems = $cleanRows($insurance->detail_feature_items, 'title');
    $recommendedPlanItems = $cleanRows($insurance->detail_recommended_plan_items, 'title');
    $policyTypes = $cleanRows($insurance->detail_policy_types, 'title');
    $howSteps = $cleanRows($insurance->detail_how_it_works_steps, 'title');
    $benefits = $cleanRows($insurance->detail_benefits, 'title');
    $buyingGuideItems = $cleanRows($insurance->detail_buying_guide_items, 'title');
    $claimProcesses = $cleanRows($insurance->detail_claim_processes, 'title');
    $claimGroups = $claimProcesses->groupBy(fn($item) => $item['type'] ?: 'Claim Process');
    $testimonials = $cleanRows($insurance->detail_testimonials, 'message');
    $trustStats = $cleanRows($insurance->detail_trust_stats, 'label');
    $faqItems = $cleanRows($insurance->detail_faqs, 'question');

    if ($faqItems->isEmpty() && isset($insurance->faqs)) {
        $faqItems = $insurance->faqs
            ->filter(fn($faq) => ($faq->publish ?? 'published') === 'published' && !empty($faq->question))
            ->map(fn($faq) => ['question' => $faq->question, 'answer' => $faq->answer])
            ->values();
    }

    $ourPartners = App\Models\OurClient::where('publish', 'published')->orderBy('id', 'desc')->get();
    $finalContent = $insurance->detail_final_content ?: $insurance->shortDescription;
    $recommendedPlanLabel = $insurance->detail_recommended_plan_label ?: 'Key Features';
    $recommendedPlanTitle = $insurance->detail_recommended_plan_title ?: "Recommended <em>{$policyName}</em> Plans";
    $recommendedPlanDescription = $insurance->detail_recommended_plan_description;
    $showRecommendedPlans = $recommendedPlanItems->isNotEmpty() || $insurance->detail_recommended_plan_title || $insurance->detail_recommended_plan_description;
    $hasHighlightedRecommendedPlan = $recommendedPlanItems->contains(fn($item) => !empty($item['highlight']));
    $buyingGuideTitle = $insurance->detail_buying_guide_title ?: "How to Choose the Right {$policyName} Plan";
    $buyingGuideTitleHtml = str_replace(e($policyName), '<em>'.e($policyName).'</em>', e($buyingGuideTitle));
@endphp

<style>
    .pk-policy {
        --pk-blue: #1040c4;
        --pk-blue-dark: #0a2d8f;
        --pk-ink: #0d1b4b;
        --pk-muted: #6b7a9e;
        --pk-soft: #eef3ff;
        --pk-line: #dce6f5;
        background: #fff;
        color: var(--pk-ink);
    }
    .pk-policy #mainNav,
    #mainNav {
        background: #0e244c;
        position: relative;
    }
    .pk-section {
        padding: 56px 0;
    }
    .pk-section-soft {
        background: #eff4ff;
    }
    .pk-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--pk-soft);
        color: var(--pk-blue);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 6px 16px;
        border-radius: 999px;
        margin-bottom: 14px;
    }
    .pk-title {
        font-size: clamp(28px, 4vw, 44px);
        font-weight: 400;
        line-height: 1.15;
        color: var(--pk-ink);
        margin-bottom: 12px;
    }
    .pk-title em {
        color: var(--pk-blue);
        font-style: normal;
    }
    .pk-copy {
        color: var(--pk-muted);
        font-size: 16px;
        line-height: 1.75;
    }
    .pk-copy p:last-child {
        margin-bottom: 0;
    }
    .pk-hero {
        /* background: linear-gradient(135deg, var(--pk-blue) 0%, var(--pk-blue-dark) 60%, #050f33 100%); */
            background: linear-gradient(135deg, #05103a 0%, #071546 60%, #050f33 100%);
        
        padding: 28px 0 24px;
    }
    .pk-hero-panel {
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .14);
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(16, 64, 196, .18);
    }
    .pk-hero-content {
        padding: 44px;
        min-height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .pk-hero h1 {
        color: #fff;
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 400;
        line-height: 1.18;
    }
    .pk-hero-sub {
        color: rgba(255, 255, 255, .76);
        max-width: 680px;
        margin-top: 14px;
    }
    .pk-tag-list,
    .pk-trust-strip,
    .pk-hero-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .pk-tag,
    .pk-trust-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 700;
    }
    .pk-tag {
        color: #fff;
        background: rgba(255, 255, 255, .10);
        border: 1px solid rgba(255, 255, 255, .16);
        padding: 8px 14px;
    }
    .pk-tag i {
        color: #f5c518;
    }
    .pk-hero-stats {
        margin-top: 34px;
    }
    .pk-stat-chip {
        flex: 1 1 160px;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .12);
        background: rgba(255, 255, 255, .07);
        border-radius: 14px;
        padding: 18px;
        min-height: 96px;
    }
    .pk-stat-chip i {
        color: #f5c518;
        font-size: 24px;
        display: block;
        margin-bottom: 8px;
    }
    .pk-quote-card {
        background: #fff;
        border-radius: 0 22px 0px 0;
        padding: 32px;
        height: 100%;
    }
    .pk-quote-card h3 {
        font-weight: 800;
        color: var(--pk-ink);
        margin-bottom: 6px;
    }
    .pk-form-label {
        font-size: 12px;
        font-weight: 800;
        color: var(--pk-ink);
        margin-bottom: 6px;
    }
    .pk-input {
        width: 100%;
        border: 1px solid #dbe4f0;
        border-radius: 10px;
        padding: 11px 12px;
        color: var(--pk-ink);
        outline: none;
    }
    .pk-input:focus {
        border-color: var(--pk-blue);
        box-shadow: 0 0 0 3px rgba(16, 64, 196, .08);
    }
    .pk-submit {
        width: 100%;
        border: 0;
        border-radius: 12px;
        background: var(--pk-blue);
        color: #fff;
        font-weight: 800;
        padding: 13px 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .pk-trust-strip {
        background: #f0f4ff;
        border-top: 1px solid var(--pk-line);
        padding: 14px 20px;
        justify-content: center;
    }
    .pk-trust-item {
        color: var(--pk-muted);
        padding: 5px 8px;
    }
    .pk-card-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 20px;
    }
    .pk-card-grid.two {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .pk-card {
        background: #fff;
        border: 1px solid #e5ecf8;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        box-shadow: 0 10px 25px rgba(16, 64, 196, .06);
    }
    .pk-card-icon {
        width: 54px;
        height: 54px;
        border-radius: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--pk-soft);
        color: var(--pk-blue);
        font-size: 24px;
        margin-bottom: 14px;
    }
    .pk-card h3,
    .pk-card h4,
    .pk-card h5 {
        color: var(--pk-ink);
        font-weight: 700;
        font-size: 16px;
    }
    .pk-card p {
        color: var(--pk-muted);
        line-height: 1.65;
        margin-bottom: 0;
    }
    .pk-feature-section {
        background:
            linear-gradient(180deg, #ffffff 0%, #f6f9ff 100%);
    }
    .pk-feature-shell {
        border: 1px solid #e1eaf8;
        border-radius: 24px;
        background: rgba(255, 255, 255, .82);
        box-shadow: 0 22px 60px rgba(16, 64, 196, .08);
        padding: 38px;
    }
    .pk-feature-header {
        max-width: 860px;
        margin: 0 auto 34px;
        text-align: center;
    }
    .pk-feature-header .sec-h,
    .pk-feature-header h2 {
        color: var(--pk-ink);
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 400;
        line-height: 1.12;
        margin-bottom: 0;
    }
    .pk-feature-header em {
        color: var(--pk-blue);
        font-style: normal;
    }
    .pk-feature-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px;
    }
    .pk-feature-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 258px;
        overflow: hidden;
        border: 1px solid #e3ecfa;
        border-radius: 18px;
        background: #fff;
        padding: 24px;
        box-shadow: 0 14px 34px rgba(13, 27, 75, .06);
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .pk-feature-card::before {
        content: "";
        position: absolute;
        inset: 0 0 auto;
        height: 4px;
        background: linear-gradient(90deg, var(--pk-blue), #38bdf8);
    }
    .pk-feature-card:hover {
        transform: translateY(-5px);
        border-color: #c8d8f2;
        box-shadow: 0 22px 48px rgba(16, 64, 196, .12);
    }
    .pk-feature-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #eff5ff;
        color: var(--pk-blue);
        font-size: 24px;
        margin-bottom: 22px;
        box-shadow: inset 0 0 0 1px #dfe9fb;
    }
    .pk-feature-card h3 {
        color: var(--pk-ink);
        font-size: 18px;
        font-weight: 800;
        line-height: 1.25;
        margin-bottom: 12px;
    }
    .pk-feature-card p {
        color: var(--pk-muted);
        font-size: 15px;
        line-height: 1.65;
        margin-bottom: 0;
    }
    .pk-recommended-section {
        background: #fff;
        padding-top: 22px;
    }
    .pk-recommended-header {
        max-width: 1040px;
        margin: 0 auto 38px;
        text-align: center;
    }
    .pk-recommended-header .pk-title {
        font-size: clamp(30px, 4vw, 44px);
        margin-bottom: 12px;
    }
    .pk-recommended-header .pk-title p {
        margin-bottom: 0;
    }
    .pk-recommended-header .pk-copy {
        max-width: 1120px;
        margin: 0 auto;
        font-size: 17px;
        line-height: 1.55;
        color: #3f4c66;
    }
    .pk-plan-rail {
        position: relative;
        max-width: 1180px;
        margin: 0 auto;
        border-radius: 24px;
        border: 1px solid #e2eaf8;
        background: linear-gradient(105deg, #f3f7ff 0%, #f8fbff 58%, #edfafa 100%);
        padding: 42px 56px 38px;
        overflow: hidden;
        box-shadow: 0 18px 50px rgba(16, 64, 196, .08);
    }
    .pk-plan-rail::before {
        content: "";
        position: absolute;
        left: 11%;
        right: 11%;
        top: 50%;
        height: 3px;
        transform: translateY(-22px);
        background: linear-gradient(90deg, #56b36c, #f7b731, #ff6b4a, #845ec2);
        opacity: .86;
    }
    .pk-plan-grid {
        position: relative;
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 34px;
    }
    .pk-plan-node {
        min-width: 0;
        text-align: center;
    }
    .pk-plan-circle {
        position: relative;
        z-index: 1;
        width: 112px;
        height: 112px;
        margin: 0 auto 16px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border: 8px solid #fff;
        color: var(--pk-blue);
        font-size: 30px;
        box-shadow: 0 14px 30px rgba(13, 27, 75, .08);
    }
    .pk-plan-circle::before {
        content: "";
        position: absolute;
        inset: -14px;
        border-radius: 50%;
        border: 3px solid #2b3d59;
        border-left-color: transparent;
        border-bottom-color: transparent;
    }
    .pk-plan-node.is-highlight .pk-plan-circle {
        background: #1f4ed8;
        color: #fff;
        box-shadow: 0 18px 36px rgba(31, 78, 216, .26);
    }
    .pk-plan-node.is-highlight .pk-plan-circle::before {
        border-color: #2b3d59;
        border-left-color: transparent;
    }
    .pk-plan-node h3 {
        color: var(--pk-ink);
        font-size: 15px;
        font-weight: 800;
        line-height: 1.25;
        margin: 0 auto;
        max-width: 170px;
    }
    .pk-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        background: var(--pk-soft);
        color: var(--pk-blue);
        border-radius: 999px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .pk-guide-section {
        background: linear-gradient(180deg, #f8fbff 0%, #f3f7fc 100%);
    }
    .pk-guide-header {
        max-width: 980px;
        margin: 0 auto 52px;
        text-align: center;
    }
    .pk-guide-header .pk-eyebrow {
        border: 1px solid #bdd1ff;
        background: #eef4ff;
        box-shadow: 0 8px 18px rgba(16, 64, 196, .06);
    }
    .pk-guide-header .pk-title {
        font-size: clamp(34px, 4vw, 52px);
        line-height: 1.08;
        margin-bottom: 18px;
    }
    .pk-guide-header .pk-title em {
        font-style: italic;
    }
    .pk-guide-header .pk-copy {
        max-width: 780px;
        margin: 0 auto;
        color: #596782;
        font-size: 17px;
        line-height: 1.65;
    }
    .pk-guide-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 24px 28px;
    }
    .pk-guide-card {
        position: relative;
        display: grid;
        grid-template-columns: 68px 1fr 38px;
        gap: 18px;
        align-items: start;
        min-height: 172px;
        border: 1px solid #dfe8f7;
        border-radius: 22px;
        background: rgba(255, 255, 255, .92);
        padding: 30px;
        box-shadow: 0 16px 40px rgba(13, 27, 75, .05);
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .pk-guide-card:hover {
        transform: translateY(-4px);
        border-color: #bdd0ef;
        box-shadow: 0 22px 48px rgba(13, 27, 75, .09);
    }
    .pk-guide-number {
        width: 68px;
        height: 68px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #eef4ff;
        color: var(--pk-blue);
        font-size: 26px;
        font-weight: 900;
        line-height: 1;
    }
    .pk-guide-card:nth-child(4n + 2) .pk-guide-number {
        background: #e5fbf7;
        color: #00a99d;
    }
    .pk-guide-card:nth-child(4n + 3) .pk-guide-number {
        background: #e9f8ef;
        color: #22ad63;
    }
    .pk-guide-card:nth-child(4n + 4) .pk-guide-number {
        background: #f3ecff;
        color: #7c3aed;
    }
    .pk-guide-content h3 {
        color: var(--pk-ink);
        font-size: 19px;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 10px;
    }
    .pk-guide-content p {
        color: #64749a;
        font-size: 16px;
        line-height: 1.62;
        margin: 0;
    }
    .pk-guide-check {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 2px solid #dbe2ec;
        color: #b8c3d4;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        justify-self: end;
    }
    .pk-guide-card:nth-child(4n + 1) {
        border-color: #1040c4;
        border-left: 10px solid #1040c4;
    }
    .pk-guide-card:nth-child(4n + 2) {
        border-left: 10px solid #00a99d;
    }
    .pk-guide-card:nth-child(4n + 3) {
        border-left: 10px solid #22ad63;
    }
    .pk-guide-card:nth-child(4n + 4) {
        border-left: 10px solid #7c3aed;
    }
    .pk-guide-card:nth-child(4n + 1) .pk-guide-check {
        background: #1040c4;
        border-color: #1040c4;
        color: #fff;
    }
    .pk-steps {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 36px;
        align-items: start;
    }
    .pk-step {
        border-left: 3px solid #dbe6f7;
        padding: 18px 0 18px 24px;
        position: relative;
        cursor: pointer;
    }
    .pk-step::before {
        content: attr(data-num);
        position: absolute;
        left: -15px;
        top: 18px;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #dbe6f7;
        color: var(--pk-muted);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 800;
    }
    .pk-step.active {
        border-left-color: var(--pk-blue);
    }
    .pk-step.active::before {
        background: var(--pk-blue);
        color: #fff;
    }
    .pk-step h3 {
        font-size: 18px;
        font-weight: 800;
        margin-bottom: 8px;
    }
    .pk-step p {
        color: var(--pk-muted);
        margin: 0;
        line-height: 1.65;
    }
    .pk-step-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
        border-radius: 20px;
        border: 1px solid #e5ecf8;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(16, 64, 196, .11);
        position: sticky;
        top: 96px;
    }
    .pk-step-card-head {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 26px 26px 20px;
        border-bottom: 1px solid #e8eef9;
        background: #fff;
    }
    #policyStepIcon {
        flex: 0 0 62px;
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background: var(--pk-blue);
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        box-shadow: 0 14px 26px rgba(16, 64, 196, .18);
    }
    .pk-step-label {
        display: block;
        color: var(--pk-blue);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .8px;
        margin-bottom: 6px;
        text-transform: uppercase;
    }
    .pk-step-card h3 {
        color: var(--pk-ink);
        font-size: 22px;
        font-weight: 800;
        line-height: 1.25;
        margin: 0;
    }
    .pk-step-card-body {
        padding: 22px 26px 26px;
    }
    .pk-step-card-body .pk-copy {
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 0;
    }
    .pk-check-list {
        display: grid;
        gap: 10px;
        margin-top: 18px;
    }
    .pk-check {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
        border: 1px solid #dfe8f7;
        border-radius: 12px;
        background: #fff;
        padding: 10px 12px;
        color: var(--pk-muted);
        font-weight: 700;
        font-size: 14px;
        line-height: 1.35;
    }
    .pk-check span {
        flex: 0 0 24px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #ecfdf5;
        color: #059669;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
    }
    .pk-check span i {
        color: inherit;
        font-size: inherit;
        line-height: 1;
    }
    .pk-claim-tabs {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }
    .pk-claim-tab {
        border-radius: 999px !important;
        padding: 11px 22px !important;
        font-weight: 800 !important;
        border: 1px solid #c3cff0 !important;
        color: var(--pk-blue) !important;
    }
    .pk-claim-tab.active {
        background: var(--pk-blue) !important;
        color: #fff !important;
    }
    .pk-testimonial-track {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }
    .pk-stars {
        color: #f5c518;
        font-size: 13px;
        margin-bottom: 10px;
    }
    .pk-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--pk-soft);
        color: var(--pk-blue);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
    }
    .pk-trust-stats {
        margin-top: 28px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 24px;
    }
    .pk-trust-stat {
        text-align: center;
        min-width: 130px;
    }
    .pk-trust-stat strong {
        display: block;
        font-size: 22px;
        color: var(--pk-blue);
    }
    .pk-faq-item {
        background: #fff;
        border: 1px solid #e5ecf8;
        border-radius: 14px;
        margin-bottom: 12px;
        overflow: hidden;
    }
    .pk-faq-q {
        padding: 18px 20px;
        display: flex;
        justify-content: space-between;
        gap: 16px;
        cursor: pointer;
        font-weight: 800;
    }
    .pk-faq-a {
        display: none;
        padding: 0 20px 18px;
        color: var(--pk-muted);
        line-height: 1.7;
    }
    .pk-faq-item.open .pk-faq-a {
        display: block;
    }
    @media (max-width: 991px) {
        .pk-quote-card {
            border-radius: 0;
        }
        .pk-card-grid,
        .pk-card-grid.two,
        .pk-feature-grid,
        .pk-plan-grid,
        .pk-guide-grid,
        .pk-testimonial-track,
        .pk-steps {
            grid-template-columns: 1fr 1fr;
        }
        .pk-feature-shell {
            padding: 28px;
        }
        .pk-plan-rail {
            padding: 34px 28px;
        }
        .pk-plan-rail::before {
            display: none;
        }
        .pk-guide-card {
            grid-template-columns: 60px 1fr;
        }
        .pk-guide-check {
            position: absolute;
            top: 22px;
            right: 22px;
        }
        .pk-step-card {
            position: static;
        }
    }
    @media (max-width: 767px) {
        .pk-hero-content,
        .pk-quote-card {
            padding: 24px;
        }
        .pk-card-grid,
        .pk-card-grid.two,
        .pk-feature-grid,
        .pk-plan-grid,
        .pk-guide-grid,
        .pk-testimonial-track,
        .pk-steps {
            grid-template-columns: 1fr;
        }
        .pk-feature-shell {
            padding: 22px;
            border-radius: 18px;
        }
        .pk-feature-card {
            min-height: 0;
        }
        .pk-plan-rail {
            padding: 26px 20px;
            border-radius: 18px;
        }
        .pk-plan-grid {
            gap: 22px;
        }
        .pk-plan-circle {
            width: 92px;
            height: 92px;
            font-size: 25px;
        }
        .pk-guide-header {
            margin-bottom: 30px;
        }
        .pk-guide-card {
            grid-template-columns: 52px 1fr;
            gap: 14px;
            min-height: 0;
            padding: 22px;
            border-radius: 18px;
        }
        .pk-guide-number {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            font-size: 21px;
        }
        .pk-guide-content h3 {
            font-size: 17px;
            padding-right: 36px;
        }
        .pk-guide-content p {
            font-size: 15px;
        }
    }
</style>

<main class="pk-policy">
    <section class="pk-hero">
        <div class="container">
            <div class="pk-hero-panel">
                <div class="row g-0">
                    <div class="col-lg-7">
                        <div class="pk-hero-content">
                            <div>
                                <h1>{{ $heroTitle }}</h1>
                                @if($heroSubtitle)
                                    <div class="pk-hero-sub pk-copy">{!! $heroSubtitle !!}</div>
                                @endif

                                @if($heroTags->isNotEmpty())
                                    <div class="pk-tag-list mt-4">
                                        @foreach($heroTags as $item)
                                            <span class="pk-tag"><i class="{{ $item['icon_class'] ?: 'fas fa-check-circle' }}"></i>{{ $item['text'] }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            @if($heroStats->isNotEmpty())
                                <div class="pk-hero-stats">
                                    @foreach($heroStats as $item)
                                        <div class="pk-stat-chip">
                                            <i class="{{ $item['icon_class'] ?: 'fas fa-shield-alt' }}"></i>
                                            <span>{{ $item['text'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="pk-quote-card">
                            <div class="mb-4">
                                <span class="pk-eyebrow"><i class="fas fa-bolt"></i> Get Instant Quote</span>
                                <h3>{{ $policyName }}</h3>
                                <p class="pk-copy mb-0">Fill in your details to view the best available plans.</p>
                            </div>

                            <form id="getPolicyFromId" action="{{ route('contactPost') }}" method="post">
                                @csrf
                                <input type="hidden" name="service" value="{{ $insurance->id }}">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="pk-form-label">Full Name *</label>
                                        <input class="pk-input" type="text" name="name" placeholder="Rahul Sharma" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="pk-form-label">Mobile *</label>
                                        <input class="pk-input" type="tel" name="mobile" placeholder="+91 9999999999" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="pk-form-label">Email *</label>
                                        <input class="pk-input" type="email" name="email" placeholder="rahul@email.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="pk-form-label">City</label>
                                        <input class="pk-input" type="text" name="city" placeholder="New Delhi">
                                    </div>
                                    <div class="col-12">
                                        <label class="pk-form-label">Message *</label>
                                        <textarea class="pk-input" name="message" rows="3" minlength="10" placeholder="Tell us what kind of policy you need" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="pk-submit" type="submit">Submit <i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>

                                <div class="pk-copy mt-3" style="font-size:13px">
                                    <i class="fas fa-lock"></i> Your data is safe and encrypted. No spam, ever.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if($trustItems->isNotEmpty())
                    <div class="pk-trust-strip">
                        @foreach($trustItems as $item)
                            <span class="pk-trust-item"><i class="{{ $item['icon_class'] ?: 'fas fa-check' }}"></i>{{ $item['text'] }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if($insurance->detail_feature_intro || $featureItems->isNotEmpty())
        <section class="pk-section pk-feature-section">
            <div class="container">
                <div class="pk-feature-shell">
                    <div class="pk-feature-header">
                        <span class="pk-eyebrow"><i class="fas fa-star"></i> Core Features</span>
                        @if($insurance->detail_feature_intro)
                            <div class="pk-copy">{!! $insurance->detail_feature_intro !!}</div>
                        @else
                            <h2>Features of <em>{{ $policyName }}</em></h2>
                        @endif
                    </div>
                    @if($featureItems->isNotEmpty())
                        <div class="pk-feature-grid">
                            @foreach($featureItems as $item)
                                <div class="pk-feature-card">
                                    <div class="pk-feature-icon"><i class="{{ $item['icon_class'] ?: 'fas fa-star' }}"></i></div>
                                    <h3>{{ $item['title'] }}</h3>
                                    @if(!empty($item['description']))
                                        <p>{{ $item['description'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    @if($showRecommendedPlans)
        <section class="pk-section pk-recommended-section">
            <div class="container">
                <div class="pk-recommended-header">
                    @if($recommendedPlanLabel)
                        <span class="pk-eyebrow"><i class="fas fa-star"></i> {{ $recommendedPlanLabel }}</span>
                    @endif
                    @if($recommendedPlanTitle)
                        <h2 class="pk-title">{!! $recommendedPlanTitle !!}</h2>
                    @endif
                    @if($recommendedPlanDescription)
                        <div class="pk-copy">{!! $recommendedPlanDescription !!}</div>
                    @endif
                </div>

                @if($recommendedPlanItems->isNotEmpty())
                    <div class="pk-plan-rail">
                        <div class="pk-plan-grid">
                            @foreach($recommendedPlanItems as $index => $item)
                                @php
                                    $isHighlighted = !empty($item['highlight']) || (!$hasHighlightedRecommendedPlan && $index === 0);
                                @endphp
                                <div class="pk-plan-node {{ $isHighlighted ? 'is-highlight' : '' }}">
                                    <div class="pk-plan-circle">
                                        <i class="{{ $item['icon_class'] ?: 'fas fa-file-alt' }}"></i>
                                    </div>
                                    <h3>{{ $item['title'] }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($insurance->detail_overview_content)
        <section class="pk-section pk-section-soft">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="pk-eyebrow"><i class="fas fa-star"></i> Policy Overview</span>
                    <h2 class="pk-title">What is <em>{{ $policyName }}?</em></h2>
                </div>
                <div class="pk-copy mx-auto" style="max-width: 900px">{!! $insurance->detail_overview_content !!}</div>
            </div>
        </section>
    @endif

    @if($policyTypes->isNotEmpty())
        <section class="pk-section">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="pk-eyebrow"><i class="fas fa-layer-group"></i> Policy Types</span>
                    <h2 class="pk-title">Types of <em>{{ $policyName }}</em> Plans</h2>
                    @if($insurance->detail_policy_types_intro)
                        <div class="pk-copy mx-auto" style="max-width: 760px">{!! $insurance->detail_policy_types_intro !!}</div>
                    @endif
                </div>
                <div class="pk-card-grid">
                    @foreach($policyTypes as $item)
                        <div class="pk-card">
                            <h3>{{ $item['title'] }}</h3>
                            @if(!empty($item['description']))
                                <p>{{ $item['description'] }}</p>
                            @endif
                            @if(!empty($item['best_for']))
                                <span class="pk-badge"><i class="fas fa-check"></i> Best for: {{ $item['best_for'] }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($insurance->detail_insurer_intro || $ourPartners->count() > 0)
        <section class="pk-section pk-section-soft">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="pk-eyebrow"><i class="fas fa-building-shield"></i> Top Insurers</span>
                    <h2 class="pk-title">Compare <em>{{ $policyName }}</em> Plans from Top Insurers</h2>
                    @if($insurance->detail_insurer_intro)
                        <div class="pk-copy mx-auto" style="max-width: 780px">{!! $insurance->detail_insurer_intro !!}</div>
                    @endif
                </div>

                @if($ourPartners->count() > 0)
                    <div class="partners-section sr">
                        <div class="partners-lbl">Our Insurance Partners</div>
                        <div class="slider--">
                            <div class="slide-track">
                                @foreach($ourPartners as $partner)
                                    <div class="client">
                                        <img src="{{ asset($partner->image ?? '') }}" alt="{{ $partner->title }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($howSteps->isNotEmpty())
        <section class="pk-section">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="pk-eyebrow"><i class="fas fa-route"></i> How It Works</span>
                    <h2 class="pk-title">{{ $insurance->detail_how_it_works_title ?: 'Getting insured is simple' }}</h2>
                    @if($insurance->detail_how_it_works_description)
                        <div class="pk-copy mx-auto" style="max-width: 760px">{!! $insurance->detail_how_it_works_description !!}</div>
                    @endif
                </div>

                <div class="pk-steps">
                    <div>
                        @foreach($howSteps as $index => $item)
                            <div class="pk-step {{ $index === 0 ? 'active' : '' }}" data-step="{{ $index }}" data-num="{{ $index + 1 }}">
                                <h3>{{ $item['title'] }}</h3>
                                @if(!empty($item['description']))
                                    <p>{{ $item['description'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="pk-step-card" id="policyStepCard">
                        <div class="pk-step-card-head">
                            <i id="policyStepIcon" class="{{ $howSteps->first()['icon_class'] ?: 'fas fa-shield-alt' }}"></i>
                            <div>
                                <span class="pk-step-label">Selected Step</span>
                                <h3 id="policyStepTitle">{{ $howSteps->first()['title'] }}</h3>
                            </div>
                        </div>
                        <div class="pk-step-card-body">
                            <p class="pk-copy" id="policyStepDescription">{{ $howSteps->first()['description'] ?? '' }}</p>
                            <div class="pk-check-list" id="policyStepChecks">
                                @foreach(($howSteps->first()['checks'] ?? []) as $check)
                                    <div class="pk-check"><span><i class="fas fa-check"></i></span>{{ $check }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($benefits->isNotEmpty())
        <section class="pk-section pk-section-soft">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="pk-eyebrow"><i class="fas fa-gift"></i> Key Benefits</span>
                    <h2 class="pk-title">{{ $insurance->detail_benefits_title ?: "Key Benefits of {$policyName}" }}</h2>
                    @if($insurance->detail_benefits_description)
                        <div class="pk-copy mx-auto" style="max-width: 760px">{!! $insurance->detail_benefits_description !!}</div>
                    @endif
                </div>

                <div class="pk-card-grid">
                    @foreach($benefits as $item)
                        <div class="pk-card">
                            <div class="pk-card-icon"><i class="{{ $item['icon_class'] ?: 'fas fa-check' }}"></i></div>
                            <h3>{{ $item['title'] }}</h3>
                            @if(!empty($item['description']))
                                <p>{{ $item['description'] }}</p>
                            @endif
                            @if(!empty($item['badge']))
                                <span class="pk-badge"><i class="fas fa-check"></i>{{ $item['badge'] }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($buyingGuideItems->isNotEmpty())
        <section class="pk-section pk-guide-section">
            <div class="container">
                <div class="pk-guide-header">
                    <span class="pk-eyebrow"><i class="fas fa-compass"></i> Buyer's Guide</span>
                    <h2 class="pk-title">{!! $buyingGuideTitleHtml !!}</h2>
                    @if($insurance->detail_buying_guide_description)
                        <div class="pk-copy">{!! $insurance->detail_buying_guide_description !!}</div>
                    @endif
                </div>

                <div class="pk-guide-grid">
                    @foreach($buyingGuideItems as $index => $item)
                        <div class="pk-guide-card">
                            <div class="pk-guide-number">{{ $index + 1 }}</div>
                            <div class="pk-guide-content">
                                <h3>{{ $item['title'] }}</h3>
                                @if(!empty($item['description']))
                                    <p>{{ $item['description'] }}</p>
                                @endif
                            </div>
                            <div class="pk-guide-check"><i class="fas fa-check"></i></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($claimGroups->isNotEmpty())
        <section class="pk-section pk-section-soft">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="pk-eyebrow"><i class="fas fa-file-medical"></i> Claims Guide</span>
                    <h2 class="pk-title">{{ $insurance->detail_claims_title ?: "{$policyName} Claims Process" }}</h2>
                    @if($insurance->detail_claims_description)
                        <div class="pk-copy mx-auto" style="max-width: 760px">{!! $insurance->detail_claims_description !!}</div>
                    @endif
                </div>

                <ul class="nav nav-pills pk-claim-tabs" role="tablist">
                    @foreach($claimGroups as $type => $steps)
                        @php $tabId = 'claim-'.\Illuminate\Support\Str::slug($type); @endphp
                        <li class="nav-item" role="presentation">
                            <button class="nav-link pk-claim-tab {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#{{ $tabId }}" type="button">
                                {{ $type }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach($claimGroups as $type => $steps)
                        @php $tabId = 'claim-'.\Illuminate\Support\Str::slug($type); @endphp
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $tabId }}">
                            <div class="pk-card-grid">
                                @foreach($steps as $index => $item)
                                    <div class="pk-card text-center">
                                        <div class="pk-card-icon"><i class="{{ $item['icon_class'] ?: 'fas fa-file-contract' }}"></i></div>
                                        <h3>{{ $item['title'] }}</h3>
                                        @if(!empty($item['description']))
                                            <p>{{ $item['description'] }}</p>
                                        @endif
                                        <span class="pk-badge">Step {{ $index + 1 }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($testimonials->isNotEmpty() || $trustStats->isNotEmpty())
        <section class="pk-section">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="pk-eyebrow"><i class="fas fa-comment-dots"></i> Customer Stories</span>
                    <h2 class="pk-title">{{ $insurance->detail_testimonial_title ?: 'Trusted by Happy Families' }}</h2>
                    @if($insurance->detail_testimonial_description)
                        <div class="pk-copy mx-auto" style="max-width: 760px">{!! $insurance->detail_testimonial_description !!}</div>
                    @endif
                </div>

                @if($testimonials->isNotEmpty())
                    <div class="pk-testimonial-track">
                        @foreach($testimonials as $item)
                            @php
                                $rating = max(1, min(5, (int)($item['rating'] ?? 5)));
                                $initial = strtoupper(substr(trim($item['name'] ?? 'C'), 0, 1));
                            @endphp
                            <div class="pk-card">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="pk-avatar">{{ $initial }}</span>
                                        <div>
                                            <h5 class="mb-0">{{ $item['name'] ?? 'Customer' }}</h5>
                                            @if(!empty($item['handle']))
                                                <small class="text-muted">{{ $item['handle'] }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="pk-stars">
                                    @for($i = 0; $i < $rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <p>{{ $item['message'] }}</p>
                                @if(!empty($item['date']))
                                    <small class="text-muted d-block mt-3">{{ $item['date'] }}</small>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($trustStats->isNotEmpty())
                    <div class="pk-trust-stats">
                        @foreach($trustStats as $item)
                            <div class="pk-trust-stat">
                                <strong>{{ $item['value'] }}</strong>
                                <span class="pk-copy">{{ $item['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($faqItems->isNotEmpty())
        <section class="pk-section pk-section-soft">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="pk-title">Frequently Asked <em>Questions</em></h2>
                </div>
                <div class="mx-auto" style="max-width: 920px">
                    @foreach($faqItems as $item)
                        <div class="pk-faq-item {{ $loop->first ? 'open' : '' }}">
                            <div class="pk-faq-q">
                                <span>{{ $item['question'] }}</span>
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="pk-faq-a">{!! $item['answer'] ?? '' !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($finalContent)
        <section class="pk-section">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="pk-eyebrow"><i class="fas fa-shield-alt"></i> Policy Overview</span>
                    <h2 class="pk-title">Compare the Best <em>{{ $policyName }}</em> Plans Today</h2>
                </div>
                <div class="pk-copy mx-auto" style="max-width: 920px">{!! $finalContent !!}</div>
            </div>
        </section>
    @endif
</main>

@if($howSteps->isNotEmpty())
    <script>
        window.policyStepData = @json($howSteps);

        function renderPolicyStep(index) {
            const item = window.policyStepData[index] || window.policyStepData[0];
            if (!item) return;

            document.querySelectorAll('.pk-step').forEach(function (step) {
                step.classList.toggle('active', parseInt(step.dataset.step, 10) === index);
            });

            document.getElementById('policyStepIcon').className = item.icon_class || 'fas fa-shield-alt';
            document.getElementById('policyStepTitle').textContent = item.title || '';
            document.getElementById('policyStepDescription').textContent = item.description || '';

            const checks = Array.isArray(item.checks) ? item.checks : [];
            document.getElementById('policyStepChecks').innerHTML = checks.map(function (check) {
                return '<div class="pk-check"><span><i class="fas fa-check"></i></span>' + check + '</div>';
            }).join('');
        }

        document.querySelectorAll('.pk-step').forEach(function (step) {
            step.addEventListener('click', function () {
                renderPolicyStep(parseInt(step.dataset.step, 10));
            });
        });
    </script>
@endif

<script>
    document.querySelectorAll('.pk-faq-q').forEach(function (question) {
        question.addEventListener('click', function () {
            const item = question.closest('.pk-faq-item');
            const panel = item.parentElement;
            panel.querySelectorAll('.pk-faq-item').forEach(function (row) {
                if (row !== item) row.classList.remove('open');
            });
            item.classList.toggle('open');
        });
    });
</script>
@stop
