<template>
    <TopText>
        <template v-slot:title>
            Informacje o kliencie
            <span class="font-bold text-primary">{{ client.name }}</span>
        </template>
        <template v-slot:description>
            Sprawdź informacje na temat twojego klienta.
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
                <label for="nip" class="form-label">Nazwa firmy</label>
                <input
                    id="nip"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.name"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="nip" class="form-label">NIP</label>
                <input
                    id="nip"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.tax_no"
                    disabled
                />
            </div>
            <div class="col-span-4">
                <label for="type" class="form-label">Numer REGON</label>
                <input
                    id="type"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.register_number"
                    disabled
                />
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="street" class="form-label">Ulica</label>
                <input
                    id="street"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.street"
                    disabled
                />
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="city" class="form-label">Miasto</label>
                <input
                    id="city"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.city"
                    disabled
                />
            </div>
            <div class="col-span-12 md:col-span-4">
                <label for="post_code" class="form-label">Kod pocztowy</label>
                <input
                    id="post_code"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.post_code"
                    disabled
                />
            </div>

            <div class="col-span-12 md:col-span-6">
                <label for="bank" class="form-label">Nazwa banku</label>
                <input
                    id="bank"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.bank"
                    disabled
                />
            </div>

            <div class="col-span-12 md:col-span-6">
                <label for="bank_account" class="form-label"
                    >Numer konta bankowego</label
                >
                <input
                    id="bank_account"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.bank_account"
                    disabled
                />
            </div>

            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Dane kontaktowe
                </h3>
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
            <div class="col-span-4">
                <label for="www" class="form-label">Strona internetowa</label>
                <input
                    id="www"
                    class="form-input bg-gray-50"
                    type="text"
                    v-model="props.client.www"
                    disabled
                />
            </div>

            <div class="col-span-12">
                <label for="note" class="form-label">Notatka</label>
                <textarea
                    class="form-input resize-none bg-gray-50 !rounded-xl"
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
