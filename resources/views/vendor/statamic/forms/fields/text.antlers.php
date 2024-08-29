{{? $hiddenFields = config('custom.forms.hidden_fields') ?}}
<input
    type="{{ input_type ?? 'text' }}"
    name="{{ handle }}"
    value="{{ value }}"
    class="form-control {{ if (hiddenFields | in_array(handle)) }} d-none {{ /if }}"
    {{ if placeholder }} placeholder="{{$ translate($placeholder) $}}" {{ /if }}
    {{ if character_limit }} maxlength="{{ character_limit }}" {{ /if }}
    {{ if js_driver }} {{ js_attributes }} {{ /if }}
    {{ if validate|contains:required }} required {{ /if }}
>
