// resources/js/bootstrap.js

import _ from 'lodash';

window._ = _;

// Si usas Axios para peticiones AJAX, puedes agregar esto:
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';