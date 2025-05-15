<x-m2m-form :title="__('Projects')" title_id="Projects"
            index_route="project.index" store_route="project.store"
            :description="__('In this form you can create multiple projects')">
    <x-form-input type="text" name="name" :title="__('Name')" required/>
    <x-form-input type="url" name="photo" :title="__('Photo')"/>
    <x-form-input type="url" name="link" :title="__('Link')"/>
    <x-form-input type="date" name="start" :title="__('Project Start')" required/>
    <x-form-input type="date" name="end" :title="__('Project End')"/>
</x-m2m-form>
