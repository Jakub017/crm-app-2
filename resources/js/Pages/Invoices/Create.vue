<template>
    <TopText>
        <template v-slot:title> Wystaw fakturę </template>
        <template v-slot:description>
            Wystaw nową fakturę dla swojego klienta.
        </template>
    </TopText>
    <div class="bg-white rounded-lg p-4 border border-secondary-light">
        <form @submit.prevent="store" class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <h3 class="text-base font-semibold text-gray-900">
                    Wybór klienta
                </h3>
            </div>
            <div class="col-span-12">
                <label for="buyer_name" class="form-label">Klient</label>
                <select
                    id="buyer_name"
                    v-model="form.buyer_name"
                    class="form-input"
                    type="text"
                >
                    <option value="">Wybierz klienta</option>
                    <option
                        v-for="client in clients"
                        :key="client.id"
                        :value="client.name"
                    >
                        {{ client.name }}
                    </option>
                </select>
                <span class="form-error" v-if="form.errors.buyer_name">{{
                    form.errors.buyer_name
                }}</span>
            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="buyer_tax_no" class="form-label">NIP</label>
                <input
                    id="buyer_tax_no"
                    class="form-input"
                    type="text"
                    v-model="form.buyer_tax_no"
                />
            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="buyer_email" class="form-label">Adres email</label>
                <input
                    id="buyer_email"
                    class="form-input"
                    type="text"
                    v-model="form.buyer_email"
                />
            </div>

            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Dodatkowe informacje
                </h3>
            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="issue_date" class="form-label"
                    >Data wystawienia</label
                >
                <input
                    id="issue_date"
                    class="form-input"
                    type="date"
                    v-model="form.issue_date"
                />
                <span class="form-error" v-if="form.errors.issue_date">{{
                    form.errors.issue_date
                }}</span>
            </div>
            <div class="col-span-12 md:col-span-6">
                <label for="payment_to" class="form-label"
                    >Termin płatności</label
                >
                <input
                    id="payment_to"
                    class="form-input"
                    type="date"
                    v-model="form.payment_to"
                />
                <span class="form-error" v-if="form.errors.payment_to">{{
                    form.errors.payment_to
                }}</span>
            </div>
            <div class="col-span-12 mt-4">
                <h3 class="text-base font-semibold text-gray-900">
                    Pozycje na fakturze
                </h3>
            </div>
            <div
                v-for="(position, index) in form.positions"
                :key="index"
                class="col-span-12 grid grid-cols-12 gap-4"
            >
                <div class="col-span-12 md:col-span-4">
                    <label for="name" class="form-label">Usluga</label>
                    <select
                        id="name"
                        v-model="position.name"
                        class="form-input"
                        type="text"
                    >
                        <option value="">Wybierz zadanie</option>
                        <option
                            v-for="task in tasks"
                            :key="task.id"
                            :value="task.name"
                        >
                            {{ task.name }}
                        </option>
                    </select>
                </div>

                <div class="col-span-12 md:col-span-2">
                    <label for="quantity" class="form-label">Ilość</label>
                    <input
                        id="quantity"
                        class="form-input"
                        type="text"
                        v-model="position.quantity"
                        @change="totalPriceGross()"
                    />
                </div>
                <div class="col-span-12 md:col-span-2">
                    <label for="net_price" class="form-label"
                        >Kwota netto</label
                    >
                    <input
                        id="net_price"
                        class="form-input"
                        type="text"
                        v-model="position.net_price"
                        @change="totalPriceGross()"
                    />
                </div>
                <div class="col-span-12 md:col-span-2">
                    <label for="tax" class="form-label">VAT</label>
                    <select
                        id="tax"
                        v-model="position.tax"
                        class="form-input"
                        type="text"
                        @change="totalPriceGross()"
                    >
                        <option value="23">23%</option>
                        <option value="8">8%</option>
                        <option value="5">5%</option>
                    </select>
                </div>
                <div class="col-span-12 md:col-span-2">
                    <label for="total_price_gross" class="form-label"
                        >Kwota brutto</label
                    >
                    <input
                        id="total_price_gross"
                        class="form-input"
                        type="text"
                        v-model="position.total_price_gross"
                        disabled
                    />
                </div>
                <div class="col-span-12 flex gap-2">
                    <button
                        class="bg-green-600 font-semibold text-white text-sm px-4 py-2 duration-300 hover:bg-green-700 rounded-full flex justify-center items-center gap-1"
                        @click.prevent="addPosition()"
                    >
                        Nowa pozycja
                    </button>
                    <button
                        class="bg-red-500 font-semibold text-white text-sm px-4 py-2 duration-300 hover:bg-red-600 rounded-full flex justify-center items-center gap-1"
                        @click.prevent="form.positions.splice(index, 1)"
                    >
                        Usuń pozycję
                    </button>
                </div>
            </div>

            <div class="col-span-12 mt-4">
                <PrimaryButton :type="'button'">Wystaw fakturę</PrimaryButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TopText from "@/Components/TopText.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps({
    clients: Array,
    today: Date,
    clientInfo: Object,
});

const form = useForm({
    buyer_name: "",
    issue_date: props.today,
    payment_to: "",
    buyer_email: "",
    buyer_tax_no: "",
    positions: [
        {
            name: "",
            quantity: 1,
            quantity_unit: "szt",
            net_price: "",
            tax: 23,
            total_price_gross: "",
        },
    ],
});

const tasks = ref({});
const clientInfo = ref({});

watch(
    () => form.buyer_name,
    async (newClient) => {
        if (newClient) {
            try {
                const response = await axios.get(route("task.get", newClient));
                tasks.value = response.data;
            } catch (error) {
                console.log("Wystapil blad podczas pobierania zadan:", error);
            }
        } else {
            tasks.value = [];
        }
    }
);

watch(
    () => form.buyer_name,
    async (newClient) => {
        if (newClient) {
            try {
                const response = await axios.get(
                    route("client.get", newClient)
                );
                clientInfo.value = response.data;
                form.buyer_email = clientInfo.value.email;
                form.buyer_tax_no = clientInfo.value.tax_no;
            } catch (error) {
                console.log(
                    "Wystapil blad podczas pobierania danych klienta:",
                    error
                );
            }
        } else {
            clientInfo.value = [];
        }
    }
);

const addPosition = () => {
    form.positions.push({
        name: "",
        quantity: 1,
        quantity_unit: "szt",
        net_price: "",
        tax: 23,
        total_price_gross: "",
    });
};

const totalPriceGross = () => {
    form.positions.forEach((position) => {
        position.total_price_gross =
            position.quantity * position.net_price * (1 + position.tax / 100);
    });
};

const store = () => form.post(route("invoice.store"));
</script>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
    layout: AppLayout,
};
</script>
