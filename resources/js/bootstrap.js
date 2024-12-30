import axios from 'axios';
import $ from "jquery";
import "jquery-validation";

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.$ = $;
window.jQuery = $;
