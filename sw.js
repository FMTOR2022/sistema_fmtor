const CACHE_NAME = "fmtor_rdg_v1.1",
  urlsToCache = [
    "https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp",
    "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap",
    "https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap",
    "https://fonts.googleapis.com/icon?family=Material+Icons",
    "http://localhost/sistema_fmtor/fmtor_1024.png",
    "http://localhost/sistema_fmtor/fmtor_512.png",
    "http://localhost/sistema_fmtor/fmtor_256.png",
    "http://localhost/sistema_fmtor/fmtor_128.png",
    "http://localhost/sistema_fmtor/fmtor_64.png",
    "http://localhost/sistema_fmtor/fmtor_32.png",
    "http://localhost/sistema_fmtor/fmtor_16.png",
    "http://localhost/sistema_fmtor/manifest.json",
    "http://localhost/sistema_fmtor/public/css/default.css",
    "http://localhost/sistema_fmtor/public/css/tema_automatico.css",
    "http://localhost/sistema_fmtor/public/css/formato.css",
    "http://localhost/sistema_fmtor/public/js/fmtor_libreria.js",
    "http://localhost/sistema_fmtor/public/js/login.js",
    "http://localhost/sistema_fmtor/script.js",
    "http://localhost/sistema_fmtor/public/img/planta4.mp4",
    "http://localhost/sistema_fmtor/main/login",
    // "http://localhost/sistema_fmtor/usuario/principal",
    // "http://localhost/sistema_fmtor/usuario/programa",
    // "http://localhost/sistema_fmtor/usuario/explosion",
    // "http://localhost/sistema_fmtor/usuario/ordenes",
    // "http://localhost/sistema_fmtor/usuario/control",
    // "http://localhost/sistema_fmtor/usuario/diario",
    // "http://localhost/sistema_fmtor/usuario/maquinas",
    // "http://localhost/sistema_fmtor/usuario/estados",
  ];

self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache => {
            return cache.addAll(urlsToCache)
            .then(() => self.skipWaiting())
        })
        .catch(err => console.log('Fallo el registro en cache', err))
    )
})

self.addEventListener('activate', e => {
    const cacheWhiteList = [CACHE_NAME]
    
    e.waitUntil(
        caches.keys()
        .then(cacheNames => {
            cacheNames.map(cacheName => {
                if(cacheWhiteList.indexOf(cacheName) === -1) {
                    return caches.delete(cacheName)
                }                
            })
        })
        .then(() => self.clients.claim())
    )
})

self.addEventListener('fetch', e => {
    e.respondWith(
        caches.match(e.request)
        .then(res => {
            if(res) {
                return res
            }
            return fetch(e.request)
        })
    )
})