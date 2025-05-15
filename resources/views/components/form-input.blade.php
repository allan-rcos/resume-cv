@props(['title' => '', 'disabled' => false])
<label class="form-group">
    <span class="block font-medium text-sm text-gray-700">{{$title}}</span>
    <input @disabled($disabled)
        {{$attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'])}}>
    <span class="block text-sm text-red-600 space-y-1"></span>
</label>
