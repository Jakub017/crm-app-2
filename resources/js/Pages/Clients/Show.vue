<template>
    <TopText>
        <template v-slot:title>
            Informacje o kliencie
            <span class="font-bold text-indigo-600">{{ client.company }}</span>
        </template>
        <template v-slot:description>
            Zapisane informacje na temat twojego klienta.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <h3 class="text-base font-semibold text-gray-900">
                    Dane firmy
                </h3>
            </div>
            <div class="col-span-4">
                <label for="company" class="form-label">Nazwa firmy</label>
                <input
                    id="company"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.company"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="nip" class="form-label">NIP</label>
                <input
                    id="nip"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.company"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="type" class="form-label">Rodzaj działalności</label>
                <input
                    id="type"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.type"
                    disabled
                />
            </div>

            <div class="col-span-3">
                <label for="country" class="form-label">Kraj</label>
                <input
                    id="country"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.country"
                    disabled
                />
            </div>
            <div class="col-span-3">
                <label for="street" class="form-label">Ulica</label>
                <input
                    id="street"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.street"
                    disabled
                />
            </div>
            <div class="col-span-3">
                <label for="city" class="form-label">Miasto</label>
                <input
                    id="city"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.city"
                    disabled
                />
            </div>
            <div class="col-span-3">
                <label for="zip_code" class="form-label">Kod pocztowy</label>
                <input
                    id="zip_code"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.zip_code"
                    disabled
                />
            </div>

            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Dane kontaktowe
                </h3>
            </div>
            <div class="col-span-4">
                <label for="person" class="form-label">Osoba kontaktowa</label>
                <input
                    id="person"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.person"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="email" class="form-label">Adres email</label>
                <input
                    id="email"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.email"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="phone" class="form-label">Numer telefonu</label>
                <input
                    id="phone"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.phone"
                    disabled
                />
            </div>

            <div class="col-span-12">
                <label for="note" class="form-label">Notatka</label>
                <textarea
                    class="form-input resize-none bg-gray-50"
                    rows="5"
                    id="note"
                    v-model="props.client.note"
                    disabled
                ></textarea>
            </div>

            <div class="col-span-12">
                <PrimaryButton :type="'Link'" :href="route('client.index')"
                    >Wróć do listy klientów</PrimaryButton
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";

const props = defineProps({
    client: Object,
});
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
