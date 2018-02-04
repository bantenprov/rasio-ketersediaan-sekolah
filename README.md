## rasio-ketersediaan-sekolah-sd-mi

[![Join the chat at https://gitter.im/rasio-ketersediaan-sekolah-sd-mi/Lobby](https://badges.gitter.im/rasio-ketersediaan-sekolah-sd-mi/Lobby.svg)](https://gitter.im/rasio-ketersediaan-sekolah-sd-mi/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/rasio-ketersediaan-sekolah-sd-mi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-ketersediaan-sekolah-sd-mi/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/rasio-ketersediaan-sekolah-sd-mi/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-ketersediaan-sekolah-sd-mi/build-status/master)

Rasio Ketersediaan Sekolah (RKS) SD / MI

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/rasio-ketersediaan-sekolah-sd-mi:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/rasio-ketersediaan-sekolah-sd-mi:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/rasio-ketersediaan-sekolah-sd-mi.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\RKSekolahSDMI\RKSekolahSDMIServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=rk-sekolah-sd-mi-assets
$ php artisan vendor:publish --tag=rk-sekolah-sd-mi-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/rk-sekolah-sd-mi',
    components: {
      main: resolve => require(['./components/views/bantenprov/rk-sekolah-sd-mi/DashboardRKSekolahSDMI.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Rasio Ketersediaan Sekolah SD/MI"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/rk-sekolah-sd-mi',
      components: {
        main: resolve => require(['./components/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Rasio Ketersediaan Sekolah SD/MI"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Rasio Keterediaan Sekolah SD/MI',
          link: '/dashboard/rk-sekolah-sd-mi',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import RKSekolahSDMI from './components/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMI.chart.vue';
Vue.component('echarts-rk-sekolah-sd-mi', RKSekolahSDMI);

import RKSekolahSDMIKota from './components/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIKota.chart.vue';
Vue.component('echarts-rk-sekolah-sd-mi-kota', RKSekolahSDMIKota);

import RKSekolahSDMITahun from './components/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMITahun.chart.vue';
Vue.component('echarts-rk-sekolah-sd-mi-tahun', RKSekolahSDMITahun);

import RKSekolahSDMIAdminShow from './components/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIAdmin.show.vue';
Vue.component('admin-view-rk-sekolah-sd-mi-tahun', RKSekolahSDMIAdminShow);

//== Echarts Angka Partisipasi Kasar

import RKSekolahSDMIBar01 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIBar01.vue';
Vue.component('rk-sekolah-sd-mi-bar-01', RKSekolahSDMIBar01);

import RKSekolahSDMIBar02 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIBar02.vue';
Vue.component('rk-sekolah-sd-mi-bar-02', RKSekolahSDMIBar02);

//== mini bar charts
import RKSekolahSDMIBar03 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIBar03.vue';
Vue.component('rk-sekolah-sd-mi-bar-03', RKSekolahSDMIBar03);

import RKSekolahSDMIPie01 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIPie01.vue';
Vue.component('rk-sekolah-sd-mi-pie-01', RKSekolahSDMIPie01);

import RKSekolahSDMIPie02 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIPie02.vue';
Vue.component('rk-sekolah-sd-mi-pie-02', RKSekolahSDMIPie02);

//== mini pie charts
import RKSekolahSDMIPie03 from './components/views/bantenprov/rk-sekolah-sd-mi/RKSekolahSDMIPie03.vue';
Vue.component('rk-sekolah-sd-mi-pie-03', RKSekolahSDMIPie03);
```
