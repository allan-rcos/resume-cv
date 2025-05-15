<x-m2m-form :title="__('Education')" title_id="Education"
            index_route="education.index" store_route="education.store"
            :description="__('In this form you can create multiple education')">
    <x-form-input type="text" name="name" :title="__('Name')" required/>
    <x-form-input type="text" name="school" :title="__('School')" required/>
    <x-form-input type="url" name="photo" :title="__('Photo')"/>
    <x-form-input type="date" name="start" :title="__('Education Start')" required/>
    <x-form-input type="date" name="end" :title="__('Education End')"/>
    <x-form-input type="text" name="address" :title="__('Address')" required/>
</x-m2m-form>
