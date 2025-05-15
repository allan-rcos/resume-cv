@props(['title_id', 'index_route', 'store_route', 'title' => 'Title', 'description' => ''])
@use('Illuminate\Support\Facades\Auth')
<?php $id_prefix = strtolower($title_id ?? $title); ?>
<form class="bg-white w-full md:max-w-4xl rounded-lg shadow-lg py-2">
    <div class="h-12 flex justify-between items-center border-b border-gray-200 m-4 pb-1">
        <div>
            <h2 class="text-xl font-bold text-gray-700"
                @isset($title_id) id="{{$title_id}}" @endisset>{{$title}}</h2>
            <div class="text-sm font-base text-gray-500">{{$description}}</div>
        </div>
        <div class="flex relative">
            <div
                class="w-10 h-10 -mr-10 p-1 text-2xl bg-green-600 text-white rounded-full text-center align-middle opacity-0 transition-opacity ease-in-out delay-150 duration-300"
                id="{{$id_prefix}}-success">&check;
            </div>
            <div
                class="w-10 h-10 p-1 text-2xl bg-red-600 text-white rounded-full text-center align-middle opacity-0 transition-opacity ease-in-out delay-150 duration-300 "
                id="{{$id_prefix}}-error">&excl;
            </div>
        </div>
    </div>
    <div class="px-6">
        <div
            class="flex flex-col gap-5 justify-center items-center min-h-16 p-4 my-6 rounded-lg border border-gray-100 shadow-md"
            id="{{$id_prefix.'-div'}}">
        </div>
        <div class="flex bg-gray-200 justify-center items-center h-16 p-4 my-6 rounded-lg shadow-inner">
            <button type="button" class="border border-gray-400 p-2 border-dashed rounded cursor-pointer"
                    id="{{$id_prefix.'-button'}}">
                <span class="text-gray-400 w-6 h-6">&plus;</span>
                <span class="ml-1 text-gray-500 font-medium">{{__('Add new form')}}</span>
            </button>
        </div>
    </div>
    <div class="p-6 pt-0">
        <x-primary-button id="{{$id_prefix.'-submit'}}" type="button" class="w-full">{{__('Save')}}</x-primary-button>
    </div>
    <template id="{{$id_prefix.'-template'}}">
        <x-disclosure>
            {{$slot}}
            <hr class="my-5">
            <div class="highlights space-y-1">
                <span class="block font-medium text-sm text-gray-700">{{__('Highlights')}}</span>
            </div>
        </x-disclosure>
    </template>
    <template id="{{$id_prefix.'-highlight-template'}}">
        <div class="highlight flex items-center gap-1.5">
            <x-form-input type="text"/>
            <button type="button"></button>
        </div>
    </template>
</form>
@push('scripts')
    <script type="module">
        localStorage.setItem('api_token', '{{Auth::user()->createToken('api-token')->plainTextToken}}');
        const id_prefix = '{{$id_prefix}}';
        const round_button_classes = 'w-8 h-8 text-xl ring-2 rounded-full hover:text-white text-center align-middle transition-colors duration-200';
        const primary_button_classes = ' ring-blue-500 text-blue-500 hover:bg-blue-500';
        const primary_button_text = '\u002b'; // &plus;
        const danger_button_classes = ' ring-red-500 text-red-500 hover:bg-red-500';
        const danger_button_text = '\u00d7'; // &times;
        const highlight_template = $('#'.concat(id_prefix, '-highlight-template')).html();

        function newPrimary(button) {
            button.attr('class', round_button_classes + primary_button_classes);
            button.text(primary_button_text);
            button.on('click', handleAddHighlight);
            return button;
        }

        function newDanger(button) {
            button.attr('class', round_button_classes + danger_button_classes);
            button.text(danger_button_text);
            button.on('click', handleRemoveHighlight);
            return button;
        }

        function primaryToDanger(button) {
            button.off('click');
            return newDanger(button);
        }

        function addHighlight(highlight_div) {
            let highlight = $(highlight_template);

            let button = highlight_div.find('button');
            if (button) primaryToDanger(button.last());
            newPrimary(highlight.find('button'));
            highlight.find('.form-group').addClass('flex-1');

            highlight_div.append(highlight);
            return highlight;
        }

        function handleAddHighlight() {
            addHighlight($(this).parent().parent());
        }

        function handleRemoveHighlight() {
            $(this).parent().remove();
        }

        function newCloseButton() {
            let button = $(`<button class="w-8 h-8 text-2xl text-red-500 hover:ring-0 hover:border-0 rounded-full hover:text-red-400 hover:bg-red-50 text-center
                align-middle transition-colors duration-200" type="button"></button>`);
            button.text(danger_button_text);
            return button;
        }

        function addNewTemplate(item) {
            let new_template = $($('#'.concat(id_prefix, '-template')).html());
            let highlight_div = new_template.find('.highlights');
            let close_button = newCloseButton()
            new_template.find('summary').append(close_button);
            close_button.on('click', () => $(new_template).remove());
            if (item) {
                item['title'] = item['name'];
                new_template.attr('x-data', JSON.stringify(item))
                for (let key in item) {
                    if (key !== 'highlights')
                        new_template.find("[name='" + key + "']").attr('x-model', key);
                    else {
                        let highlights = item[key];
                        for (let highlight_key in highlights) {
                            let highlight_form = addHighlight(highlight_div);
                            let highlight = highlights[highlight_key];

                            highlight_form.find('input').val(highlight['description']);
                        }
                    }
                }
            }
            new_template.find("input[name='name']").attr('x-model', 'title')
            addHighlight(highlight_div);
            $('#'.concat(id_prefix, '-div')).append(new_template);
            return new_template;
        }

        function submit() {
            $('span.text-red-600').text('');
            const error_circle = $('#'.concat(id_prefix, '-error'));
            error_circle.attr('title', '');
            if (!error_circle.hasClass('opacity-100')) {
                error_circle.addClass('opacity-0');
                error_circle.removeClass('opacity-100');
            }

            let data = [];

            $.each($('#'.concat(id_prefix, '-div details')).toArray(), (idx, subform) => {
                let item = {highlights: []};

                $.each($(subform).find('input').toArray(), (input_idx, input) => {
                    let name = $(input).attr('name');
                    let value = $(input).val();
                    if (!(value != null) || value.trim() === '')
                        return
                    if (name != null)
                        item[name] = value;
                    else
                        item['highlights'].push(value)
                })
                if (item['highlights'].length <= 0)
                    delete item['highlights'];

                if (Object.keys(item).length > 1)
                    data.push(item);
            })
            if (data.length <= 0) {
                error_circle.attr('title', '500: Data is Empty');
                error_circle.removeClass('opacity-0');
                error_circle.addClass('opacity-100');
                return
            }

            $.ajax({
                url: "{{route($store_route)}}",
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('api_token')
                },
                data: JSON.stringify(data),
                dataType: 'json',
                contentType: 'application/json',
                processData: false,
                statusCode: {
                    201: () => {
                        $('#'.concat(id_prefix, '-success')).removeClass('opacity-0').addClass('opacity-100');
                        setTimeout(() => $('#'.concat(id_prefix, '-success')).removeClass('opacity-100').addClass('opacity-0'), 5000);
                    },
                    400: (response) => {
                        let error_title = '';
                        let forms = $('#'.concat(id_prefix, '-div')).find('details');
                        $.each(response.responseJSON['errors'], (form_idx, form_errors) => {
                            console.log(form_errors)
                            let form = $(forms.get(form_idx));
                            console.log(form);
                            $.each(form_errors, (key, error) => {
                                let input = form.find(`[name='${key}']`);
                                console.log(input);
                                if (input != null)
                                    input.parent().find('span.text-red-600').text(error);
                                else
                                    error_title += '\n' + error;
                            })
                        })
                        if (error_title !== '') {
                            error_circle.attr('title', error_title);
                            error_circle.addClass('opacity-100');
                            error_circle.removeClass('opacity-0');
                        }
                    }
                },
                error: (response) => {
                    if (response.status === 201)
                        return;
                    error_circle.attr('title', response.status.toString());
                    error_circle.addClass('opacity-100');
                    error_circle.removeClass('opacity-0');
                }
            })
        }

        $(document).ready(() => {
            $('#'.concat(id_prefix, '-button')).on('click', () => addNewTemplate());
            $('#'.concat(id_prefix, '-submit')).on('click', () => submit());

            $.ajax({
                url: "{{route($index_route)}}",
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('api_token')
                },
                success: (data) => {
                    if (data != null && 'data' in data && data['data'].length > 0) {
                        for (let key in data['data']) {
                            addNewTemplate(data['data'][key]);
                        }
                    } else {
                        addNewTemplate();
                    }
                }
            })
        })
    </script>
@endpush
