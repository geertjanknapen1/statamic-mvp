<textarea
    name="{{ handle }}"
    rows="5"
    class="form-control"
    {{ if placeholder }} placeholder="{{$ translate($placeholder) $}}" {{ /if }}
    {{ if character_limit }} maxlength="{{ character_limit }}" {{ /if }}
    {{ if js_driver }} {{ js_attributes }} {{ /if }}
    {{ if validate|contains:required }} required {{ /if }}
>
    {{ value }}
</textarea>
