import { Link } from "@inertiajs/react"

export default function MenuItem({ link, icon, text, isActive, method = 'get', isShow = true }){
    return isShow && (
        <Link 
            href={link ? route(link) : ""} 
            className={`side-link ${isActive && "active"}`}
            method={method}
            as="button">
            {icon}
            {text}
        </Link>
    )
}