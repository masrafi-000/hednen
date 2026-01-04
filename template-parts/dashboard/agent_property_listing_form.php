<style>
    .preview-img {
        object-fit: cover !important;
        height: 100px !important;
        width: 100px !important;
        border-radius: 8px !important;
        border: 2px solid #e5e7eb !important;
    }
</style>

<div class="w-full! !mx-auto !bg-white !p-8 !rounded-xl !shadow-lg !border !border-gray-100 !my-10">
    <div class="!mb-8 !border-b !pb-4">
        <h2 class="!text-3xl !font-bold !text-gray-800">Submit Property</h2>
    </div>

    <form id="property-listing-form" class="space-y-6!" enctype="multipart/form-data">

        <?php wp_nonce_field('submit_property_action', 'property_nonce'); ?>

        <!-- Agent Info -->
        <div class="!grid !grid-cols-1 !md:grid-cols-2 !gap-4">
            <div>
                <label class="!block !text-sm !font-medium !text-gray-700">Full Name</label>
                <input type="text" name="agent_name" required class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border">
            </div>
            <div>
                <label class="!block !text-sm !font-medium !text-gray-700">Email</label>
                <input type="email" name="agent_email" required class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border">
            </div>
        </div>

        <!-- Property Info -->
        <div class="!grid !grid-cols-1 !md:grid-cols-2 !gap-4 !border-t !pt-4">
            <div class="!col-span-1 !md:col-span-2">
                <label class="!block !text-sm !font-medium !text-gray-700">Title</label>
                <input type="text" name="property_title" required class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border">
            </div>
            <div>
                <label class="!block !text-sm !font-medium !text-gray-700">Price ($)</label>
                <input type="number" name="property_price" class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border">
            </div>
            <div>
                <label class="!block !text-sm !font-medium !text-gray-700">Type</label>
                <select name="property_type" class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border">
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                </select>
            </div>
            <div class="!col-span-1 !md:col-span-2">
                <label class="!block !text-sm !font-medium !text-gray-700">Description</label>
                <textarea name="property_description" rows="3" class="!mt-1 !block !w-full !rounded-md !border-gray-300 !p-2 !border"></textarea>
            </div>
        </div>

        <!-- Details -->
        <div class="!grid !grid-cols-3 !gap-4 !border-t !pt-4">
            <div><label class="!block !text-sm">Beds</label><input type="number" name="property_beds" class="!w-full !border !p-2 !rounded"></div>
            <div><label class="!block !text-sm">Baths</label><input type="number" name="property_baths" class="!w-full !border !p-2 !rounded"></div>
            <div><label class="!block !text-sm">Sq Ft</label><input type="number" name="property_area" class="!w-full !border !p-2 !rounded"></div>
        </div>

        <!-- Address -->
        <div class="!grid !grid-cols-2 !gap-4 !border-t !pt-4">
            <div class="!col-span-2"><label class="!block !text-sm">Street</label><input type="text" name="address_street" class="!w-full !border !p-2 !rounded"></div>
            <div><label class="!block !text-sm">City</label><input type="text" name="address_city" class="!w-full !border !p-2 !rounded"></div>
            <div><label class="!block !text-sm">State</label><input type="text" name="address_state" class="!w-full !border !p-2 !rounded"></div>
            <div><label class="!block !text-sm">Zip</label><input type="text" name="address_zip" class="!w-full !border !p-2 !rounded"></div>
        </div>

        <!-- Amenities -->
        <div class="!mt-4 !border-t !pt-4">
            <label class="!block !text-sm !font-medium !mb-2">Amenities</label>
            <div class="!flex !gap-4">
                <label><input type="checkbox" name="amenities[]" value="garage"> Garage</label>
                <label><input type="checkbox" name="amenities[]" value="pool"> Pool</label>
                <label><input type="checkbox" name="amenities[]" value="wifi"> WiFi</label>
            </div>
        </div>

        <!-- Images -->
        <div class="!border-t !pt-4">
            <label class="!block !text-sm !font-medium !text-gray-700 !mb-2">Images (Max 5)</label>
            <input id="dropzone-file" type="file" name="property_images[]" multiple accept="image/*" class="!block !w-full !text-sm !text-gray-500 !file:mr-4 !file:py-2 !file:px-4 !file:rounded-full !file:border-0 !file:text-sm !file:font-semibold !file:bg-blue-50 !file:text-blue-700 !hover:file:bg-blue-100" />
            <div id="image-preview-container" class="!flex !flex-wrap !gap-2 !mt-4"></div>
        </div>

        <button type="submit" id="submit-btn" class="!w-full !mt-6 !py-3 !bg-blue-600 !text-white !rounded !hover:bg-blue-700">Submit Listing</button>
        <div id="form-message" class="!mt-4 !text-center !font-bold"></div>
    </form>
</div>