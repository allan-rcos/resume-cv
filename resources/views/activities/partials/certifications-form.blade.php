<x-m2m-form :title="__('Certifications')" title_id="Certifications"
            index_route="certification.index" store_route="certification.store"
            :description="__('In this form you can create multiple certifications')">
    <x-form-input type="text" name="name" :title="__('Name')" required/>
    <x-form-input type="url" name="photo" :title="__('Photo')"/>
    <x-form-input type="number" min="1900" max="2099" step="1" name="year" :title="__('Year of Conclusion')" required/>
    <x-form-input type="text" name="school" :title="__('School')" required/>
</x-m2m-form>
