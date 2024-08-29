{{? $hiddenFields = config('custom.forms.hidden_fields') ?}}
{{? $hiddenLabels = config('custom.forms.hidden_labels.reviews') ?}}
{{? $sideFields = ['country', 'language_select'] ?}}
{{ form:reviews name="reviews" class="p-0 m-0" id="reviews-form"}}

<!-- {{# if an error occurs that is not related to a specific field it will be shown here  #}} -->
<span class="invalid-feedback invalid-form" data-failure="{{ translate key='failure' }}"></span>

<!-- {{# render all form fields that have been defined in the statamic blueprint.
     how formfields are rendered can be changed through antler files in /resources/views/vendor/statamic/forms/fields #}} -->
<div class="row">
    {{ fields }}
    <div
        class="form-group field-{{ handle }} {{ if (sideFields | in_array(handle)) }} col-6 {{ else }} col-{{$ percentageToColumn($width) $}} {{ /if }}   {{ if (hiddenFields | in_array(handle)) }} d-none {{ /if }}">
        <label class="{{ if (type === 'toggle') }} d-none {{ /if }} {{ if first }} mt-0 pt-0 {{ /if }}" for="{{ translate key=" $handle" }}">
        {{ translate key="$handle" }}
        {{ if validate|contains:required }} * {{ /if }}
        </label>
        {{ field }}
        <span class="{{$ $handle $}} invalid-feedback"></span>
    </div>
    {{ /fields }}
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<!-- {{# honeypot field & locale #}} -->
<input type="text" class="d-none" name="{{ honeypot ?? 'honeypot' }}">
<input type="text" class="d-none" name="locale" value="{{$ app()->getLocale() $}}">
<input type="text" class="d-none" name="product_id" value="{{$ $product->id $}}">
<legend>
    <button type="submit" class="btn btn-primary btn-submit form-ajax-submit btn-disabled ">
        <span>{{ translate key="submit" }} your review</span>
        <i id="envelope-icon" class="far fa-envelope"></i>
        <i id="spinning-loader" class="fas fa-circle-notch fa-spin d-none"></i>
    </button>
</legend>
{{ /form:reviews }}
