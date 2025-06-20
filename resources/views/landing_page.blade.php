<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InVentas - Plataforma para Mayoristas</title>
    
    <!-- Cargar Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/landing_page.css') }}" rel="stylesheet"> <!-- Cargar tu propio CSS -->
</head>
<body class="bg-light">

    <!-- Encabezado (Header) -->
    <header class="bg-dark text-white py-4 fade-in">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-3xl font-bold">InVentas</h1>
            <nav>
                <ul class="list-unstyled d-flex mb-0">
                    <li><a href="#caracteristicas" class="text-white mx-3">Características</a></li>
                    <li><a href="#beneficios" class="text-white mx-3">Beneficios</a></li>
                    <li><a href="#testimonios" class="text-white mx-3">Testimonios</a></li>
                    <li><a href="#planes" class="text-white mx-3">Planes</a></li>
                    <li><a href="#contacto" class="text-white mx-3">Contacto</a></li>
                    <li><a href="/login" class="btn btn-warning ms-3">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Sección Hero -->
    <section id="hero" class="text-center bg-primary text-white py-5 fade-in delay-1">
        <div class="container position-relative">
            <h2 class="text-4xl font-semibold mb-4">Transforma tu negocio con InVentas</h2>
            <img src="/images/hero_bisuteria.jpg" alt="Emprendedora de bisutería" class="img-fluid mb-4" style="max-height: 350px; object-fit: cover; border-radius: 18px;">
            <p class="text-lg mb-6">Soluciones mayoristas y minoristas especializadas en bisutería.</p>
            <a href="#servicios" class="btn btn-light btn-lg shadow-lg">Descubre Nuestros Servicios</a>
            <div class="position-absolute w-100" style="left:0;bottom:-40px;z-index:0;pointer-events:none;">
                <svg height="40" width="100%" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0,10 Q50,0 100,10 Z" fill="#fff" opacity="0.2"/></svg>
            </div>
        </div>
    </section>

    <!-- Características -->
    <section id="caracteristicas" class="py-5 fade-in delay-2">
        <div class="container text-center">
            <h3 class="text-3xl font-bold mb-8">Características de nuestro servicio</h3>
            <div class="row justify-content-center">
                <div class="col-md-5 feature card-hover mx-2 mb-4">
                    <img src="/images/icono_plataforma.jpg" alt="Plataforma" style="height:288px;" class="mb-2">
                    <h4>Plataforma Inteligente</h4>
                    <p>Una plataforma fácil de usar que permite a los mayoristas y minoristas gestionar inventarios, ventas y pedidos desde un solo lugar.</p>
                </div>
                <div class="col-md-5 feature card-hover mx-2 mb-4">
                    <img src="/images/icono_asesoria.jpg" alt="Asesoría" style="height:288px;" class="mb-2">
                    <h4>Asesoría Personalizada</h4>
                    <p>El equipo de InVentas ofrece asesoría exclusiva para cada cliente, adaptando soluciones a medida que impulsan el crecimiento de tu negocio.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios -->
    <section id="beneficios" class="bg-light py-5 fade-in delay-3">
        <div class="container text-center">
            <h3 class="text-3xl font-bold mb-8">Beneficios</h3>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-7">
                    <ul class="list-unstyled">
                        <li class="mb-2"><span class="fw-bold">✔</span> Acceso a un amplio catálogo de productos de bisutería</li>
                        <li class="mb-2"><span class="fw-bold">✔</span> Precios competitivos y descuentos exclusivos</li>
                        <li class="mb-2"><span class="fw-bold">✔</span> Soporte personalizado 24/7</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <img src="/images/beneficios_clientes.jpg" alt="Clientes felices" class="img-fluid rounded shadow mt-3" style="max-width: 350px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios" class="py-5 scroll-animate">
        <div class="container text-center">
            <h3 class="text-3xl font-bold mb-8">Testimonios de Clientes</h3>
            <div class="row justify-content-center">
                <div class="col-md-4 card-hover mb-4">
                    <img src="/images/testimonio_juan.jpg" alt="Juan Pérez" class="rounded-circle mb-2" style="width:180px;height:180px;object-fit:cover;">
                    <p>"Gracias a InVentas, hemos mejorado nuestras ventas y distribuimos nuestros productos a un mayor número de clientes."</p>
                    <h5>- Juana Pérez, Distribuidor de Bisutería</h5>
                </div>
                <div class="col-md-4 card-hover mb-4">
                    <img src="/images/testimonio_marta.jpg" alt="Marta López" class="rounded-circle mb-2" style="width:180px;height:180px;object-fit:cover;">
                    <p>"Excelente servicio, muy profesionales. ¡Altamente recomendados! Nos han ayudado a expandir nuestro mercado."</p>
                    <h5>- Marta López, Tienda de Accesorios</h5>
                </div>
                <div class="col-md-4 card-hover mb-4">
                    <img src="/images/testimonio_luis.jpg" alt="Luis García" class="rounded-circle mb-2" style="width:180px;height:180px;object-fit:cover;">
                    <p>"La plataforma es fácil de usar y ha facilitado la gestión de nuestros pedidos. Definitivamente la mejor opción para mayoristas."</p>
                    <h5>- Luisa García, Mayorista de Joyería</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Planes -->
    <section id="planes" class="bg-light py-5 scroll-animate">
        <div class="container text-center">
            <h3 class="text-3xl font-bold mb-8">Planes Disponibles</h3>
            <div class="row g-3 justify-content-center">
                <!-- Plan Inicial -->
                <div class="col-lg-4 col-md-6 plan card-hover mb-4 p-3 bg-white border rounded-4 shadow-sm">
                    <img src="/images/plan_basico.png" alt="Plan Inicial" style="height:100px;" class="mb-2">
                    <h4 class="fw-bold">Inicial</h4>
                    <div class="text-muted mb-2">Para emprendedores que inician</div>
                    <div class="display-5 fw-bold mb-1">$0 <span class="fs-6">USD</span></div>
                    <div class="mb-2 text-muted">Plan gratuito para comenzar</div>
                    <hr>
                    <div class="text-start mb-2">
                        <div class="fw-bold mb-2">Funciones destacadas</div>
                        <ul class="list-unstyled">
                            <li>✔ Gestión básica de inventario</li>
                            <li>✔ Hasta 10 productos</li>
                            <li>✔ 1 usuario administrador</li>
                            <li>✔ Reportes simples</li>
                        </ul>
                    </div>
                    <button onclick="window.location='{{ route('planes.inicial') }}'" class="btn btn-dark w-100 py-2">Comenzar gratis</button>
                </div>
                <!-- Plan Avanzado -->
                <div class="col-lg-4 col-md-6 plan card-hover mb-4 p-3 bg-white border rounded-4 shadow-sm">
                    <img src="/images/plan_avanzado.png" alt="Plan Avanzado" style="height:100px;" class="mb-2">
                    <h4 class="fw-bold">Avanzado</h4>
                    <div class="text-muted mb-2">Para negocios en crecimiento</div>
                    <div class="display-5 fw-bold mb-1">$150 <span class="fs-6">USD</span></div>
                    <div class="mb-2 text-muted">Pago anual</div>
                    <hr>
                    <div class="text-start mb-2">
                        <div class="fw-bold mb-2">Funciones destacadas</div>
                        <ul class="list-unstyled">
                            <li>✔ Inventario ilimitado</li>
                            <li>✔ Hasta 5 usuarios</li>
                            <li>✔ Gestión de ventas y pedidos</li>
                            <li>✔ Reportes avanzados</li>
                            <li>✔ Soporte por chat</li>
                        </ul>
                    </div>
                    <button onclick="window.location='{{ route('planes.avanzado') }}'" class="btn btn-dark w-100 py-2">Prueba gratis</button>
                </div>
                <!-- Plan Premium -->
                <div class="col-lg-4 col-md-6 plan card-hover mb-4 p-3 bg-white border rounded-4 shadow-sm">
                    <img src="/images/plan_premium.png" alt="Plan Premium" style="height:100px;" class="mb-2">
                    <h4 class="fw-bold">Premium</h4>
                    <div class="text-muted mb-2">Para empresas y mayoristas</div>
                    <div class="display-5 fw-bold mb-1">$250 <span class="fs-6">USD</span></div>
                    <div class="mb-2 text-muted">Pago anual</div>
                    <hr>
                    <div class="text-start mb-2">
                        <div class="fw-bold mb-2">Funciones destacadas</div>
                        <ul class="list-unstyled">
                            <li>✔ Todo lo del plan Avanzado</li>
                            <li>✔ Usuarios ilimitados</li>
                            <li>✔ Multi-sucursal y multi-almacén</li>
                            <li>✔ Integración con marketplaces</li>
                            <li>✔ Soporte prioritario</li>
                            <li>✔ Personalización de reportes</li>
                        </ul>
                    </div>
                    <button onclick="window.location='{{ route('planes.premium') }}'" class="btn btn-dark w-100 py-2">Solicitar demo</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de contacto -->
    <section id="contacto" class="py-5 fade-in delay-4">
        <div class="container">
            <h3 class="text-3xl font-bold mb-8">Contacto</h3>
            <img src="/images/contacto_icono.png" alt="Contacto" style="height:60px;" class="mb-3">
            <form action="#" method="POST" class="card-hover p-4 shadow-lg bg-white rounded-3">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-4 fade-in">
        <p>&copy; 2025 InVentas. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts de Bootstrap y animaciones -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Animación de scroll para testimonios y planes
    function onScrollAnimate() {
        document.querySelectorAll('.scroll-animate').forEach(function(el) {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                el.classList.add('visible');
            }
        });
    }
    window.addEventListener('scroll', onScrollAnimate);
    window.addEventListener('DOMContentLoaded', onScrollAnimate);
    </script>
</body>
</html>
