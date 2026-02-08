export const BASE_URL = "http://127.0.0.1:8000/";

const params = new URLSearchParams(window.location.search);
const lang = params.get("lang") || "ar";

console.log(lang);

export const API_HEADER = {
  "Content-Type": "application/json",
  "access-control-allow-credentials": "true",
  "Accept-Language": lang
};
