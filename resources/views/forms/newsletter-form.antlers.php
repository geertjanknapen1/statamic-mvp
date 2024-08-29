{{? $hiddenFields = config('custom.forms.hidden_fields') ?}}
<div class="d-none" id="composed-view-data" data-countries='{{$ $countries $}}' data-languages='{{$ $formSites $}}'></div>
{{ form:newsletter_form name="newsletter_form" id="newsletter-form" class="content-form p-lg-0 ms-auto me-auto"}}

<!-- {{# if an error occurs that is not related to a specific field it will be shown here  #}} -->
<span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

<!-- {{# render all form fields that have been defined in the statamic blueprint.
     how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
<div class="row">
    {{ fields }}
    <div class="form-group col-{{$ percentageToColumn($width) $}} {{ if (hiddenFields | in_array(handle)) }} d-none {{ /if }}">
        {{ field }}
        <span class="{{$ $handle $}} invalid-feedback"></span>
    </div>
    {{ /fields }}

    <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
    <button class="form-ajax-submit btn btn-primary btn-submit btn-disabled" id="newsletterConfirm" data-gtm-label="button-newsletter-confirm">
        <span>{{ translate key="newsletter_btn" }}</span>
        <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
    </button>
</div>

<!-- {{# honeypot field & locale #}} -->
<input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
<input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">

{{ /form:newsletter_form }}
