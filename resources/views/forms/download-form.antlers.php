{{? $hiddenFields = config('custom.forms.hidden_fields') ?}}

<p>{{ translate key="your-download" }}: {{$ $page->downloadTitle $}}</p>
<div class="d-none" id="composed-view-data" data-countries='{{$ $countries $}}' data-languages='{{$ $formSites $}}'></div>
{{ form:download_form name="download_form" id="download-form" class="content-form p-lg-0"}}

<!-- {{# if an error occurs that is not related to a specific field it will be shown here  #}} -->
<span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

<!-- {{# render all form fields that have been defined in the statamic blueprint.
     how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
<div class="row">
    {{ fields }}
        {{ if handle == "newsletter_opt_in" }}
            {{ partial:antlers/forms/partials/opt-in :fieldHandle="handle"}}
        {{ else }}
            <div class="col-12 mb-4 {{ if (hiddenFields | in_array(handle)) }} d-none {{ /if }}">
                <label class="form-label d-block" for="{{ handle }}">{{$ translate(str_slug(strtolower($display))) $}}:</label>
                {{ field }}
                <span class="{{$ $handle $}} invalid-feedback"></span>
            </div>
        {{ /if }}
    {{ /fields }}

    <div id="download-information"
         data-js-download-container="{{$ $page->downloadContainer $}}"
         data-js-download-identifier="{{$ $page->encryptedFilename $}}"
         data-js-download-title="{{$ $page->downloadTitle $}}"
         data-js-download-categories="{{$ $page->downloadCategories $}}"
         data-js-download-slug="{{$ $page->downloadSlug $}}"
    ></div>

    <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
    <button class="form-ajax-submit btn btn-primary btn-submit btn-disabled" id="downloadFormSubmit" data-gtm-label="button-download-form-submit">
        <span>{{ translate key="download_button" }}</span>
        <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
    </button>
</div>

<!-- {{# honeypot field & locale #}} -->
<input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
<input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">

{{ /form:download_form }}
