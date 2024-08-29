<div class="d-none" id="composed-view-data" data-countries='{{$ $countries $}}' data-languages='{{$ $formSites $}}'></div>
{{ form:subscribe_to_newsletter name="subscribe_to_newsletter" id="subscribe-to-newsletter-form" }}

    <div class="input-group">
        <!-- {{# render all form fields that have been defined in the statamic blueprint.
        how formfields are rendered can be changed through antler files in /resources/views/datavendor/statamic/forms/fields #}} -->
        {{ fields }}
                {{ field }}
                {{ if (handle === 'email') }}
                    <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
                    <a href="{{$ localizedRoute('newsletter') $}}" class="input-group-text btn-submit btn-disabled btn-newsletter btn-primary" data-js="newsletter-register" disabled>
                        <span>{{ translate key="footer.btn_text" }}</span>
                        <i id="envelope-icon" class="far fa-envelope"></i>
                        <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
                    </a>
                {{ /if }}
                <span class="{{$ $handle $}} invalid-feedback">
                    {{$ trans('validation.email', ['attribute' => translate($fields[0]['placeholder'])]) $}}
                </span>
        {{ /fields }}

        <span class="invalid-feedback" data-failure="{{ translate key='failure' }}"></span>

        <p class="subtext">
            {{ translate key="footer.newsletter_no_worries_your_data_is_safe" }}
        </p>
    </div>

    <!-- {{# honeypot field & locale #}} -->
    <input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
    <input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">
    <input type="text" class="d-none" name="language" value="{{$ app()->getLocale() $}}">
{{ /form:subscribe_to_newsletter }}
