/**
 * Helper para hacer peticiones API reutilizables
 * url- Endpoint de la API
 * method - Método HTTP (GET, POST, PUT, DELETE) Por defecto GET
 * data - Datos a enviar (opcional)
 * return - Respuesta de la API
 */
export async function apiFetch(url, method = "GET", data = null) {
    const config = {
        method: method,
        headers: {
            "Authorization": `Bearer ${localStorage.getItem('token')}`,
            "Accept": "application/json",
        },
    };

    if (data && method !== "GET") {
        if (data instanceof FormData) {
            config.body = data;
        } else {
            config.headers["Content-Type"] = "application/json";
            config.body = JSON.stringify(data);
        }
    }

    const response = await fetch(url, config);

    return await response.json();
}