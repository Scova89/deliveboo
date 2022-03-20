import Vue from 'vue';
import vClickOutside from 'v-click-outside'

Vue.use(vClickOutside)

export default Vue.observable({
    categorie: [],
    selectedCategories: [],
    restaurants: [],
    cart: [],
    checkout: false,
    key: 0,
    checkCart: false,
    chooseData: [],
});



