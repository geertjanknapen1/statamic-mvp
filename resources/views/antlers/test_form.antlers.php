{{ form:test_form name="test_form" id="test-form"}}

    <!-- {{# if an error occurs that is not related to a specific field it will be shown here  #}} -->
    <span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

    <!-- {{# render all form fields that have been defined in the statamic blueprint.
         how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
    <div class="row">
        {{ fields }}
            <div class="form-group col-12 $}}">
                <label for="{{ handle }}">
                    {{ handle }}
                    {{ if validate|contains:required }} * {{ /if }}
                </label>
                {{ field }}

                <span class="{{$ $handle $}} invalid-feedback"></span>
            </div>
        {{ /fields }}
    </div>

    <!-- {{# honeypot field & locale #}} -->
<!--    <input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">-->
<!--    <input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">-->

    <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
    <button class="form-ajax-submit btn btn-primary btn-submit btn-disabled rounded-md px-3 py-2 text-black ring-1 ring-transparent transition  hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
        <span>Submit</span>
        <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
    </button>

{{ /form:test_form }}
