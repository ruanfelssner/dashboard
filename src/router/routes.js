import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/Home'

export default [
    ...auth,
    ...home
]