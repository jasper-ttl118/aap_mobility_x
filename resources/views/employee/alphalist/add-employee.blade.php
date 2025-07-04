<x-app-layout class='flex flex-row w-h-screen' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]" navbar_selected='Employee Management'>
  
    <div x-data="{ selected : 'employees', open_add_employee : false, open_delete_employee : false, 
                   open_view_employee : false, open_edit_employee : false, open_add_intern : false, 
                   open_delete_intern : false, open_view_intern : false, open_edit_intern : false
                }" 
        class="flex flex-1 flex-col lg:ml-52 overflow-y-auto p-10 gap-7 mt-12 bg-[#f3f4f6]">
      
        <!-- Options Container -->
        <div class=" rounded-md border-2 border-gray-100 bg-white shadow-lg overflow-x-auto hide-scrollbar flex-shrink-0">
            <div class="flex h-14">
                <x-employee.submodules selected="Alphalist" />
            </div>
        </div>

        <div class="@container/main rounded-md border-2 border-gray-100 bg-white justify-center items-center flex w-full flex-col shadow-lg -mt-4">
            <div class="flex flex-col justify-between w-full mt-3">
                 {{-- Breadcrumbs --}}
                <div class="flex justify-start w-full gap-x-1 text-[#071d49] text-sm px-7 pt-5">
                    <a href="/employee" class="hover:underline">Employee Management</a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="/employee" class="hover:underline">Alphalist</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    <a href="#" class="hover:underline font-semibold">Add Employee</a>
                </div>
            </div>

            <header class="mt-5 flex justify-center flex-col items-start w-full px-10">
                <h2 class="text-2xl font-medium text-[#151847]">ADD NEW EMPLOYEE</h2>
                <h5 class="text-lg font-medium text-[#151847]">Personal Details</h5>
            </header>
            <main class="space-y-6 w-full h-full">
                <section class="space-y-1.5">
                    <livewire:employee.alphalist.add-employee />
                </section>
            </main>
        </div>
    </div>
    

    <script>
        let childIndex = 1; // Start from 2 since we already have 0 and 1
        let contactIndex = 1;

        function addContactFields() {
            const container = document.getElementById('contact-container');
            // Check if we need to create a new row
            let currentRow = container.querySelector('.child-row:last-child'); // Fixed: use .child-row

            // If no row exists or current row already has 1 child, create a new row
            if (!currentRow || currentRow.children.length >= 1) {
                currentRow = document.createElement('div');
                currentRow.className = 'child-row flex flex-row w-full justify-between items-start'; // Fixed: use child-row
                container.appendChild(currentRow);
            }

            const div = document.createElement('div');
            div.className = 'contact-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6 mt-4';
            div.innerHTML = `
                <div class="flex justify-between items-center">
                    <label class="hidden text-aapblue @lg/main:block" for="middle">Contact Person #${contactIndex + 1}</label>
                    <button type="button" onclick="deleteContactField(this)" class="text-red-500 hover:text-red-700 font-bold text-sm">Delete</button>
                </div>
                
                <div class="flex flex-col w-full gap-x-5 gap-y-6">
                    <div class="flex flex-row w-full gap-x-5">
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="fullName">Full Name</label>
                            <input type="text" name="emergency_contact_1_name[${contactIndex}][name]" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex" required>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="relationship">Relationship</label>
                            <input type="text" name="emergency_contact_1_relationship[${contactIndex}][relationship]" placeholder="e.g., Brother" class="profile_edit_input w-full flex" required>
                        </div>
                        <div class="space-y-1 flex flex-col w-[33%]">
                            <label class="hidden text-aapblue @lg/main:block" for="contactNumber">Contact Number</label>
                            <input class="profile_edit_input" type="number" name="emergency_contact_1_number[${contactIndex}][number]" id="contactNumber" placeholder="e.g., 09123456789" required>
                        </div>
                    </div>
                    <div class="space-y-1 flex flex-col w-full">
                        <label class="hidden text-aapblue @lg/main:block" for="address">Contact Address</label>
                        <textarea class="profile_edit_input w-full resize-none" name="emergency_contact_1_address[${contactIndex}][address]" id="contactAddress" cols="20" rows="3" 
                                    placeholder="Contact's full address"></textarea>
                    </div>
                </div>
            `;

            currentRow.appendChild(div);
            contactIndex++;
        }
        
        // function addChildFields() {
        //     const container = document.getElementById('children-container');
            
        //     // Check if we need to create a new row
        //     let currentRow = container.querySelector('.child-row:last-child');
            
        //     // If no row exists or current row already has 2 children, create a new row
        //     if (!currentRow || currentRow.children.length >= 1) {
        //         currentRow = document.createElement('div');
        //         currentRow.className = 'child-row flex flex-row w-full justify-between items-start gap-x-5 mb-5';
        //         container.appendChild(currentRow);
        //     }

        //     const div = document.createElement('div');
        //     div.className = 'child-input flex flex-col w-full gap-4 border border-blue-400 rounded-lg p-6 mt-4';
        //     div.innerHTML = `
        //         <div class="flex justify-between items-center">
        //             <label class="hidden text-aapblue @lg/main:block" for="middle">Child #${childIndex + 1}</label>
        //             <button type="button" onclick="deleteChildField(this)" class="text-red-500 hover:text-red-700 font-bold text-sm">Delete</button>
        //         </div>
                
        //         <div class="flex flex-row w-full gap-x-5">
        //             <div class="space-y-1 flex flex-col w-[50%]">
        //                 <label class="hidden text-aapblue @lg/main:block" for="middle">Full Name </label>
        //                 <input type="text" name="children[${childIndex}][name]" id="childFullName_${childIndex}" placeholder="e.g., Juan Dela Cruz" class="profile_edit_input w-full flex">
        //             </div>
        //             <div class="space-y-1 flex flex-col w-[50%]">
        //                 <label class="hidden text-aapblue @lg/main:block" for="middle">Birthdate</label>
        //                 <input class="profile_edit_input" type="date" name="children[${childIndex}][birthdate]" id="childBirthdate_${childIndex}" placeholder="e.g., 01/05/2002">
        //             </div>
        //         </div>
        //     `;

        //     currentRow.appendChild(div);
        //     childIndex++;
        // }

        // function deleteChildField(button) {
        //     const childInput = button.closest('.child-input');
        //     const row = childInput.closest('.child-row');
            
        //     // Remove the child input
        //     childInput.remove();
            
        //     // If the row is now empty, remove it
        //     if (row && row.children.length === 0) {
        //         row.remove();
        //     }
            
        //     // Renumber all children to maintain proper sequence
        //     renumberChildren();
        // }

        function deleteContactField(button) {
            const contactInput = button.closest('.contact-input');
            const row = contactInput.closest('.child-row'); // Fixed: use .child-row not .contact-row
            
            // Remove the contact input
            contactInput.remove();
            
            // If the row is now empty, remove it
            if (row && row.children.length === 0) {
                row.remove();
            }
            
            // Renumber all contacts to maintain proper sequence
            renumberContact();
        }

        function renumberChildren() {
            // Only renumber the dynamically added children (not the original 0 and 1)
            const dynamicChildInputs = document.querySelectorAll('.child-row .child-input');
            let currentIndex = 1; // Start from 2 since you already have 0 and 1
            
            dynamicChildInputs.forEach((input) => {
                // Update the label
                const label = input.querySelector('label');
                if (label) {
                    label.textContent = `Child #${currentIndex + 1}`;
                }

                // Update input names and IDs
                const nameInput = input.querySelector('input[name*="[name]"]');
                const ageInput = input.querySelector('input[name*="[age]"]');
                const birthdateInput = input.querySelector('input[name*="[birthdate]"]');
                
                if (nameInput) {
                    nameInput.name = `children[${currentIndex}][name]`;
                    nameInput.id = `childFullName_${currentIndex}`;
                }
                if (ageInput) {
                    ageInput.name = `children[${currentIndex}][age]`;
                    ageInput.id = `childAge_${currentIndex}`;
                }
                if (birthdateInput) {
                    birthdateInput.name = `children[${currentIndex}][birthdate]`;
                    birthdateInput.id = `childBirthdate_${currentIndex}`;
                }
                
                currentIndex++;
            });
            
            // Update the global childIndex to the next available index
            childIndex = currentIndex;
        }

        function renumberContact() {
            // Get all dynamically added contact inputs
            const dynamicContactInputs = document.querySelectorAll('.contact-input');
            let currentIndex = 0; // Start from 0 to maintain sequence
            
            dynamicContactInputs.forEach((input) => {
                // Update the label
                const label = input.querySelector('.flex.justify-between label');
                if (label) {
                    label.textContent = `Contact Person #${currentIndex + 1}`;
                }

                // Update input names - fix the naming pattern to match your HTML
                const nameInput = input.querySelector('input[name*="[name]"]');
                const relationshipInput = input.querySelector('input[name*="[relationship]"]');
                const numberInput = input.querySelector('input[name*="[number]"]');
                const addressInput = input.querySelector('textarea[name*="[address]"]'); // Note: textarea, not input
                
                if (nameInput) {
                    nameInput.name = `emergency_contact_1_name[${currentIndex}][name]`;
                    nameInput.id = `contactFullName_${currentIndex}`;
                }
                if (relationshipInput) {
                    relationshipInput.name = `emergency_contact_1_relationship[${currentIndex}][relationship]`;
                    relationshipInput.id = `contactRelationship_${currentIndex}`;
                }
                if (numberInput) {
                    numberInput.name = `emergency_contact_1_number[${currentIndex}][number]`;
                    numberInput.id = `contactNumber_${currentIndex}`;
                }
                if (addressInput) {
                    addressInput.name = `emergency_contact_1_address[${currentIndex}][address]`;
                    addressInput.id = `contactAddress_${currentIndex}`;
                }
                
                currentIndex++;
            });
            
            // Update the global contactIndex to the next available index
            contactIndex = currentIndex;
        }

    </script> 
</x-app-layout>