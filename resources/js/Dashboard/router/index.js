import { createRouter, createWebHashHistory } from 'vue-router'
import NProgress from 'nprogress'
import routes from '@/Dashboard/router/routes'
import { sidebarState } from '@/Dashboard/composables'

const router = createRouter({
  history: createWebHashHistory('kui-dashboard-vue'),
  routes,
})

router.beforeEach(() => {
  NProgress.start()
})

router.afterEach(() => {
  if (window.innerWidth <= 1024) {
    sidebarState.isOpen = false
  }
  NProgress.done()
})

export default router
