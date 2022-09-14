export default [
  {
    path: '/',
    name: 'Home',
    component: () => import('@/Dashboard/views/Index'),
  },
  {
    path: '/dashboard',
    component: () => import('@/Dashboard/layouts/DashboardLayout.vue'),
    children: [
      {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('@/Dashboard/views/Dashboard.vue'),
      },
      {
        path: '/pages/blank',
        name: 'Blank',
        component: () => import('@/Dashboard/views/pages/Blank.vue'),
      },
    ],
  },
  {
    path: '/auth',
    name: 'Auth',
    component: () => import('@/Dashboard/layouts/AuthenticationLayout.vue'),
    children: [
      {
        path: '/auth/login',
        name: 'Login',
        component: () => import('@/Dashboard/views/auth/Login.vue'),
      },
      {
        path: '/auth/register',
        name: 'Register',
        component: () => import('@/Dashboard/views/auth/Register.vue'),
      },
      {
        path: '/auth/forgot-password',
        name: 'ForgotPassword',
        component: () => import('@/Dashboard/views/auth/ForgotPassword.vue'),
      },
      {
        path: '/auth/reset-password',
        name: 'ResetPassword',
        component: () => import('@/Dashboard/views/auth/ResetPassword.vue'),
      },
      {
        path: '/auth/confirm-password',
        name: 'ConfirmPassword',
        component: () => import('@/Dashboard/views/auth/ConfirmPassword.vue'),
      },
      {
        path: '/auth/verify-email',
        name: 'VerifyEmail',
        component: () => import('@/Dashboard/views/auth/VerifyEmail.vue'),
      },
    ],
  },
]
