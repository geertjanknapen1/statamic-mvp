<select
    class="form-select {{ if visibility !== 'visible' }} d-none {{ /if }}"
    name="{{ handle }}{{ multiple ?= "[]" }}"
    {{ if js_driver }}{{ js_attributes }}{{ /if }}
    {{ if multiple }}multiple{{ /if }}
    {{ if validate|contains:required }}required{{ /if }}
>
    {{ unless multiple }}
        <option value>
            {{ if placeholder }}
                {{$ translate($placeholder) $}}
            {{ else }}
                {{$ translate('option-please-select') $}}
            {{ /if }}
        </option>
    {{ /unless }}
    {{ foreach:options as="option|label" }}
        <option value="{{ option }}"{{ if multiple }}{{ if value|in_array:option }} selected{{ /if }}{{ else }}{{ if option == value }} selected{{ /if }}{{ /if }}>
        {{$ translate($option) $}}
        </option>
    {{ /foreach:options }}
</select>
