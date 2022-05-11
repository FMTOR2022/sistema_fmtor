const url = "http://localhost/sistema_fmtor";
const CACHE_NAME = "service_worker_depto",
  urlsToCache = [
    "https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp",
    "https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap",
    "https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap",
    "https://fonts.googleapis.com/icon?family=Material+Icons",
    url + "/public/css/default.css",
    url + "/public/css/tema_automatico.css",
    url + "/public/css/formato.css",
    url + "/public/js/fmtor_libreria.js",
    url + "/public/js/worker/script.js",
    url + "/public/js/produccion/control.js",
    url + "/public/js/produccion/diario.js",
    url + "/public/js/produccion/estado_op.js",
    url + "/public/js/produccion/estados.js",
    url + "/public/js/produccion/filtros.js",
    url + "/public/js/produccion/maquinas.js",
    url + "/public/js/produccion/ordenes.js",
    url + "/public/js/produccion/programa_forjado.js",
    url + "/public/js/produccion/prueba.js",
    url + "/public/js/produccion/render_control_admin.js",
    url + "/public/js/produccion/render_control_usuario.js",
    url + "/public/js/produccion/render_diario_admin.js",
    url + "/public/js/produccion/render_diario_usuario.js",
    url + "/public/js/produccion/render_programa_forjado_admin.js",
    url + "/public/js/produccion/render_programa_forjado_usuario.js",
    url + "/main/login",
    url + "/usuario/principal",
    url + "/usuario/programa",
    url + "/usuario/explosion",
    url + "/usuario/ordenes",
    url + "/usuario/control",
    url + "/usuario/diario",
    url + "/usuario/maquinas",
    url + "/usuario/estados",
  ];

self.addEventListener("install", (e) => {
  e.waitUntil(
    caches
      .open(CACHE_NAME)
      .then((cache) => {
        return cache.addAll(urlsToCache).then(() => self.skipWaiting());
      })
      .catch((err) => console.log("Fallo el registro en cache", err))
  );
});

self.addEventListener("activate", (e) => {
  const cacheWhiteList = [CACHE_NAME];

  e.waitUntil(
    caches
      .keys()
      .then((cacheNames) => {
        cacheNames.map((cacheName) => {
          if (cacheWhiteList.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        });
      })
      .then(() => self.clients.claim())
  );
});

self.addEventListener("fetch", (e) => {
  e.respondWith(
    caches.match(e.request).then((res) => {
      if (res) {
        return res;
      }
      return fetch(e.request);
    })
  );
});
