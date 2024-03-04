import axios from "axios";
const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_APIBASE,
  headers: {
    "Content-Type": "application/json",
  },
});
export default axiosInstance;
