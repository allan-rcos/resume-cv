@use('App\Enums\SkillTypeEnum')
@use('Illuminate\Support\Facades\Auth')
<section>
    <x-profiles.card id="Skills">
        @slot('title')
            {{ __('Skills') }}
        @endslot
        <x-slot:description>
            {{
                __('You can update your Skills here.
                    Some of this data will be used in your resumés.
                    Please keep the name clean and straightforward')
            }}
        </x-slot:description>
    </x-profiles.card>

    <form class="mt-6 space-y-6">
        @csrf

        <div id="skill-container">

        </div>

        <div>
            <x-primary-button type="button">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'details-updated')
                <x-profiles.message>
                    {{ __('Saved.') }}
                </x-profiles.message>
            @endif
        </div>
    </form>
    @once
        <template id="skill-form">
            <div class="skill-form">
                <x-form-input title="name" type="text" name="name"/>
                <x-range-slider label="proficiency" name="level"/>
                <div class="flex gap-2 p-4">
                    @foreach(SkillTypeEnum::cases() as $cases)
                        <x-radio-group :label="$cases->label()" :value="$cases->value" class="max-w-lg" name="type"/>
                    @endforeach
                </div>
                <div class="flex justify-end">
                    <div>
                        <x-danger-button type="button">{{__('Remove')}}</x-danger-button>
                        <x-primary-button type="button">{{__('New')}}</x-primary-button>
                    </div>
                </div>
            </div>
        </template>
    @endonce
</section>

@push('scripts')
    <script type="module">
        localStorage.setItem('api_token', '{{Auth::user()->createToken('api-token')->plainTextToken}}');
        const template = $('#skill-form').html();
        const container = $('#skill-container');
        const new_button_class = 'new-skill-button';
        const remove_button_class = 'remove-skill-button';

        function random_id() {
            return 'n' + Math.floor(Math.random() * 10000).toString();
        }

        function handleRemove(event) {
            const id = $(event.target).data('id');
            if (!id.startsWith('n')) {
                deleteSkill(id);
                return
            }
            $(`div[data-id="${id}"]`).remove();
        }

        function handleNew() {
            addTemplate();
        }

        function deleteSkill(id) {
            $.ajax({
                url: "{{route('skills.remove'), 0}}".replace('0', id),
                type: 'DELETE',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('api-token')
                },
                success: () => {
                    $(`div[data-id="${id}"]`).remove();
                },
                error: (response) => {
                    $(`div[data-id="${id}"]`).find('span.text-red-600');
                }
            })
        }

        function addTemplate(item) {
            const new_template = $(template);
            const buttons = new_template.find('button');
            const remove_button = buttons.get(0);
            const new_button = buttons.get(1);
            let new_id = random_id();
            container.find(new_button_class)
                .each(() => $(this).addClass('hidden'));
            if (item) {
                new_id = item.id;
                new_template.find('[name="name"]').val(item.name ?? '');
                new_template.find('[name="level"]').val(item.level ?? '50');
                new_template.find(`[name="type"][value="${item.value}"]`).prop('checked', true);
            }
            new_template.data('id', new_id);
            remove_button.data('id', new_id);
            remove_button.addClass(remove_button_class);
            remove_button.on('click', handleRemove);
            new_button.data('id', new_id);
            new_button.addClass(new_button_class);
            new_button.on('click', handleNew);
            container.append(new_template);
        }

        $(document).ready(() => {
            $.ajax({
                url: "{{route('skills.index')}}",
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('api_token')
                },
                success: (data) => {
                    if (data != null && 'data' in data && data['data'].length > 0) {
                        for (const item of data['data']) {
                            addTemplate(item)
                        }
                    } else {
                        addTemplate();
                    }
                }
            })
        })
    </script>
@endpush
