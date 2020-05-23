import VueRouter from 'vue-router' 
import store from './store'

import mainApp from './mainApp'
import DashboardComponent from './components/DashboardComponent'
import AnimalsComponent from './components/AnimalsComponent'
import CreateAnimalComponent from './components/CreateAnimalComponent'
import LoginComponent from './components/LoginComponent'

export const router = new VueRouter({ 
    mode: 'history', 
    
    routes: [ 
        {
            path: '/', 
            component: mainApp,
            props: {loginComponent: LoginComponent},
    
            children: [
                {
                    path: 'animals',
                    component: AnimalsComponent

                },

                {
                    path: 'create',
                    component: CreateAnimalComponent
                }
            ]
        },
    ]
})

router.beforeEach((to, from, next) => {
    // Start the route progress bar.
    NProgress.start()
    
    next()
})

router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
})