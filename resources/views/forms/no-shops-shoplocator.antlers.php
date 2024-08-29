{{ form:no_shops_shoplocator name="no_shops_shoplocator" id="no-shops-shoplocator" }}

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

    <div class="w-100 mx-0 mt-5 mb-lg-0 row justify-content-end px-lg-0 px-3">
         <!-- {{# submit button, the 'form-ajax-submit' is picked up by jquery that will submit this form through ajax #}} -->
         <button class="btn col-12 col-lg-3 col-xl-2 btn-disabled RobotoMedium me-lg-3 form-ajax-submit" disabled>{{ translate key="submit" }}
             <i class="ms-2 fa fa-angle-right"></i>
             <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
         </button>
    </div>

{{ /form:no_shops_shoplocator }}
