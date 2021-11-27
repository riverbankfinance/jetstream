<template>
    <app-layout title="List Leads">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               <i class="fas fa-users"></i> Leads: {{$page.props.user.name}}
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="flex flex-col">
                        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table-fixed min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Full Name
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Phone
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Goal
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Loan Type
                                    </th>
                                    <th scope="col" class="w-1/8 px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                        Date Added
                                    </th>
                                    <th scope="col" class="w-1/8 text-center text-xs px-6 py-3 font-medium text-gray-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="lead in leads" :key="lead.id" class="even:bg-gray-50">
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        <div>
                                            <div class="box-content text-center h-10 min-w-full py-2 bg-red-600">
                                                <div class="pt-3"><span class="text-white text-sm uppercase">
                                                    <a :href="route('lead.view', {lead: lead})">
                                                        New
                                                    </a>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       <a :href="route('lead.view', {lead: lead})">
                                            {{lead.fullName}}
                                            </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div>{{lead.address}}</div>
                                        <div>{{lead.city}}, {{lead.state}} {{lead.zip}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{lead.email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div><span class="pt-4 whitespace-nowrap text-sm text-gray-500">
                                             <a :href="'tel:+'+lead.phone"> <i class="fas fa-phone-alt text-green-500"></i></a> <a :href="'sms:+'+lead.phone"> <i class="fas fa-sms text-blue-500"></i></a> <a :href="'tel:+'+lead.phone"> {{lead.phone}} </a>
                                        </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{lead.goal}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{lead.loan_type}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       <div>{{ moment(lead.created_at).format('h:mm a')  }}</div>
                                       <div>{{ moment(lead.created_at).format('MM/D/YY')  }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                       <div class="text-blue-500">
                                           <a :href="route('lead.view', {lead: lead})">
                                            <i class="far fa-edit"></i>
                                            </a>
                                        </div>
                                       <div class="text-red-500">
                                           <a :href="route('lead.delete', {lead: lead})">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                    </tr>
                                    <!-- More people... -->
                                </tbody>
                                </table>
                                <template>
                                    <div class="text-center">
                                        <v-pagination
                                        v-model="page"
                                        :length="6"
                                        ></v-pagination>
                                    </div>
                                    </template>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import moment from "moment";

    export default defineComponent({
        components: {
            AppLayout,
            JetApplicationLogo,
        },
        props: ['leads'],
        methods: {
            moment: function (date) {
            return moment(date);
            }
        }
    })
</script>
