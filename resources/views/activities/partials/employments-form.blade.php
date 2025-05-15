<x-m2m-form :title="__('Employment')" title_id="Employment"
            index_route="employment.index" store_route="employment.store"
            :description="__('In this form you can create multiple employments')">
    <x-form-input type="text" name="name" :title="__('Name')" required/>
    <x-form-input type="url" name="photo" :title="__('Photo')"/>
    <x-form-input type="date" name="start" :title="__('Employment Start')" required/>
    <x-form-input type="date" name="end" :title="__('Employment End')"/>
    <x-form-input type="text" name="address" :title="__('Address')" required/>
</x-m2m-form>
