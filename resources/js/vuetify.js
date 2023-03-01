import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import 'font-awesome/css/font-awesome.min.css'
import { aliases, fa } from 'vuetify/iconsets/fa4'

export default createVuetify({
    icons: {
        defaultSet: 'fa',
        aliases,
        sets: {
            fa,
        }
    }, theme: {
        defaultTheme: 'light'
    },
    components,
    directives,
});
