/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register-component', require('./components/registerComponent.vue').default);

//Componentes pagina de inicio
Vue.component('welcome-component', require('./components/general/WelcomeComponent.vue').default);
Vue.component('aboutus-component', require('./components/general/AboutUsComponent.vue').default);
Vue.component('members-component', require('./components/general/MembersComponent.vue').default);
Vue.component('founders-component', require('./components/general/FoundersComponent.vue').default);
Vue.component('focus-component', require('./components/general/FocusComponent.vue').default);

Vue.component('vue-google-heatmap', require('./components/general/HeatMapsComponent.vue').default);

Vue.component('indexmanagement-component', require('./components/management/IndexManagementComponent.vue').default);
Vue.component('focusmanagement-component', require('./components/management/FocusManagementComponent.vue').default);
Vue.component('eventsmanagement-component', require('./components/ally/manageEventsComponent.vue').default);
Vue.component('show-events-component', require('./components/beneficiary/ShowEventsComponent.vue').default);
Vue.component('show-my-events-component', require('./components/beneficiary/ShowMyEventsComponent.vue').default);
Vue.component('finish-course-component', require('./components/management/finishCourseComponent.vue').default);
Vue.component('edit-information-component', require('./components/editInformationComponent.vue').default);
Vue.component('my-events-component', require('./components/ally/myEventsComponent.vue').default);
Vue.component('spinner', require('./components/common/spinnerComponent.vue').default);

Vue.component('my-events-ally-component', require('./components/ally/myEventsAlly.vue').default);
Vue.component('my-beneficiary-ally-component', require('./components/ally/myBeneficiaryAlly.vue').default);


Vue.component('footer-component', require('./components/general/footerComponent.vue').default);

Vue.component('manage-users-component', require('./components/management/manageUsers.vue').default);
Vue.component('change-password-component', require('./components/auth/changePassword.vue').default);

Vue.component('certified-component', require('./components/management/certifiedComponent.vue').default);

Vue.component('add-certifieds-component', require('./components/management/addCertifiedsComponent.vue').default);





// leaflet
Vue.component('l-map', window.Vue2Leaflet.LMap);








/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
