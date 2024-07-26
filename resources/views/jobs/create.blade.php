<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
<form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Job</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you:</p>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field class="sm:col-span-4">
            <x-form-label for="title">Title</x-form-label>
            <div class="mt-2">
                <x-form-input name="title" id="title" placeholder="Shift Leader" required/>
            </div>
            <x-form-error name="title"/>
          </x-form-field>

          <div class="sm:col-span-4">
            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
                <x-form-input name="salary" id="salary" placeholder="$5000" required/>
            </div>
            <x-form-error name="salary"/>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <x-form-button>Save</x-form-button>
    </div>
  </form>

</x-layout>

