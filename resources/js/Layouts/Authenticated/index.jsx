import React from "react"
import SideBar from "./SideBar"
import TopBar from "./TopBar"

export default function Authenticated({children}){
    return <>
        <div className="mx-auto max-w-screen hidden lg:block">
            {/* Start Sidebar */}
            <SideBar/>
            {/* End Sidebar */}

            {/* Start Content */}
            <div className="ml-[300px] px-[50px]">
                <div className="py-10 flex flex-col gap-[50px]">
                    <TopBar/>
                    {children}
                </div>
            </div>
            {/* End Content */}
        </div>
        <div className="mx-auto px-4 w-full h-screen lg:hidden flex bg-black">
            <div className="text-white text-2xl text-center leading-snug font-medium my-auto">
                Sorry, this page only supported on 1024px screen or above
            </div>
        </div>
    </>
}