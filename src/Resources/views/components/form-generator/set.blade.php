@props([
    "value" => []
])
@php($types = [
    'text' => __('Text'),
    'number' => __('Number'),
    'email' => __('Email'),
    'textarea' => __('Text Area'),
    'html' => __('Html'),
    'file' => __('File Upload'),
])
<div class="row gap-3" id="form-rows">
    <!-- Здесь будут динамически добавляться новые поля -->
</div>
<div class="mt-3">
    <button type="button" id="addRow" class="btn btn-success">
        <i class="ri-add-fill"></i>
        {{ __('Add Field') }}
    </button>
</div>

<template id="row-template">
    <input type="hidden" name="form_generator[extensions][]" value="">
    <input type="hidden" name="form_generator[options][]" value="">
    <div class="row">
        <div class="col">
            <x-input type="text" placeholder="Название" name="form_generator[form_label][]"/>
        </div>
        <div class="col">
            <x-input type="select" name="form_generator[form_type][]" :variants="$types"/>
        </div>
        <div class="col">
            <x-input type="select" name="form_generator[is_required][]"
                     :variants="['required' => 'Required', 'optional' => 'Optional']"/>

        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-secondary move-up">↑</button>
            <button type="button" class="btn btn-secondary move-down">↓</button>
            <button type="button" class="btn btn-danger remove">
                <i class="ri-delete-bin-7-line"></i>
            </button>
        </div>
    </div>
</template>

@pushonce('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formRowsContainer = document.getElementById('form-rows');
            const addRowButton = document.getElementById('addRow');
            const rowTemplate = document.getElementById('row-template').content;

            addRowButton.addEventListener('click', function () {
                const newRow = rowTemplate.cloneNode(true);
                setupRow(newRow);
                formRowsContainer.appendChild(newRow);
            });

            function setupRow(rowElement) {
                rowElement.querySelector('.remove').addEventListener('click', function () {
                    this.closest('.row').remove();
                });

                rowElement.querySelector('.move-up').addEventListener('click', function () {
                    const currentRow = this.closest('.row');
                    if (currentRow.previousElementSibling) {
                        currentRow.parentNode.insertBefore(currentRow, currentRow.previousElementSibling);
                    }
                });

                rowElement.querySelector('.move-down').addEventListener('click', function () {
                    const currentRow = this.closest('.row');
                    if (currentRow.nextElementSibling) {
                        currentRow.parentNode.insertBefore(currentRow.nextElementSibling, currentRow);
                    }
                });
            }

            function renderInitialForm(value) {
                if (value && value.length > 0) {
                    value.forEach(item => {
                        const newRow = rowTemplate.cloneNode(true);

                        const formLabelInput = newRow.querySelector('[name="form_generator[form_label][]"]');
                        if (formLabelInput) formLabelInput.value = item.name;

                        const formTypeSelect = newRow.querySelector('[name="form_generator[form_type][]"]');
                        if (formTypeSelect) {
                            formTypeSelect.value = item.type; // Прямая установка value для select
                        }

                        const isRequiredSelect = newRow.querySelector('[name="form_generator[is_required][]"]');
                        if (isRequiredSelect) {
                            isRequiredSelect.value = item.is_required; // Прямая установка value для select
                        }

                        setupRow(newRow);
                        formRowsContainer.appendChild(newRow);
                    });
                }
            }

            renderInitialForm(@json($value));
        });

    </script>
@endpushonce
