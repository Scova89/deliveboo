import Vue from 'vue';
import vClickOutside from 'v-click-outside'
import vue_braintree from 'vue-braintree';

Vue.use(vClickOutside)
Vue.use(vue_braintree);

export default Vue.observable({
    categorie: [],
    selectedCategories: [],
    restaurants: [],
    cart: [],
    checkout: false,
    key: 0,
    checkCart: false,
    chooseData: [],
    loaded: false,
    errors: [],
    caricamentoTypologies: false,
    caricamentoSuggested: false,
    caricamentoRestaurants: false
});



