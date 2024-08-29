<div class="content-form servicedesk-or-expert theme-base-light">
    {{ form:contact_an_expert name="contact_an_expert" id="contact-an-expert-form" }}

        <!-- {{# if an error occurs that is not related to a specific field it will be shown here #}} -->
        <span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

        <div class="row">
            <!-- {{# render all form fields that have been defined in the statamic blueprint.
                 how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
            {{ fields }}
                <div class="form-group col-{{$ percentageToColumn($width) $}}">
                    <label for="{{ translate key="$handle" }}">
                        {{ translate key="$handle" }}
                        {{ if validate|contains:required }} * {{ /if }}
                    </label>
                    {{ field }}
                    <span class="{{$ $handle $}} invalid-feedback"></span>
                </div>
            {{ /fields }}
        </div>

        <!-- {{# honeypot field & locale #}} -->
        <input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
        <input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">

        <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
        <button class="btn btn-primary btn-submit form-ajax-submit btn-disabled" disabled>
            <span>{{ translate key="submit" }}</span>
            <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
        </button>
    {{ /form:contact_an_expert }}
</div>
