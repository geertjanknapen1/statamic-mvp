{{ form:contact_service_desk name="contact_service_desk" id="contact-service-desk-form"}}

    <!-- {{# if an error occurs that is not related to a specific field it will be shown here #}} -->
    <span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

    <div class="row m-0 px-2">
        <!-- {{# render all form fields that have been defined in the statamic blueprint.
             how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
        {{ fields }}
            <div class="form-group col-{{$ percentageToColumn($width) $}} {{ if validate|contains:required }} required {{ /if }}">
                <label for="{{ translate key="$handle" }}">
                    {{ translate key="$handle" }}
                    {{ if validate|contains:required }} * {{ /if }}
                </label>
                {{ field }}
                <span class="{{$ $handle $}} invalid-feedback"></span>
            </div>
        {{ /fields }}

        <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
        <button type="submit" class="btn btn-primary btn-submit form-ajax-submit btn-disabled" disabled>
            <span>{{ translate key="submit" }}</span>
            <i id="envelope-icon" class="far fa-envelope"></i>
            <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
        </button>
    </div>
    <!-- {{# honeypot field & locale #}} -->
    <input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
    <input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">



{{ /form:contact_service_desk }}
