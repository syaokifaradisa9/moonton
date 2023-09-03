import { useEffect } from 'react';
import Input from "@/Components/Input"
import Label from "@/Components/Label"
import Button from "@/Components/Button"
import { Link, Head, useForm } from "@inertiajs/react"
import ValidationErrors from '@/Components/ValidationErrors';

export default function Register(){
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return <>
        <Head title="Sign Up"/>
        <div className="mx-auto max-w-screen min-h-screen bg-black text-white md:px-10 px-3">
            <div className="fixed top-[-50px] hidden lg:block">
                <img src="/assets/images/signup-image.png"
                    className="hidden laptopLg:block laptopLg:max-w-[450px] laptopXl:max-w-[640px]" alt=""/>
            </div>
            <div className="py-24 flex laptopLg:ml-[680px] laptopXl:ml-[870px]">
                <div>
                    <img src="/assets/images/moonton-white.svg" alt=""/>
                    <div className="my-[70px]">
                        <div className="font-semibold text-[26px] mb-3">
                            Sign Up
                        </div>
                        <p className="text-base text-[#767676] leading-7">
                            Explore our new movies and get <br/>
                            the better insight for your life
                        </p>
                        <ValidationErrors errors={errors}/>
                    </div>
                    <form className="w-[370px]" onSubmit={submit}>
                        <div className="flex flex-col gap-6">
                            <div>
                                <Label forInput="fullname" value="Full Name"/>
                                <Input
                                    type="text" 
                                    name="fullname"
                                    placeholder="Your fullname..." 
                                    value={data.name}
                                    isFocused={true}
                                    handleChange={(e) => setData('name', e.target.value)}
                                    required={true}/>
                            </div>
                            <div>
                                <Label forInput="email" value="Email Address"/>
                                <Input
                                    type="text" 
                                    name="email"
                                    placeholder="Your fullname..." 
                                    handleChange={(e) => setData('email', e.target.value)}
                                    value={data.email}
                                    required={true}/>
                            </div>
                            <div>
                                <Label forInput="password" value="Password"/>
                                <Input
                                    type="password" 
                                    name="password"
                                    placeholder="Your password..."
                                    handleChange={(e) => setData('password', e.target.value)}
                                    value={data.password}
                                    required={true}/>
                            </div>
                            <div>
                                <Label forInput="password_confirmation" value="Confirmation Password"/>
                                <Input
                                    type="password" 
                                    name="fullname"
                                    placeholder="Your password..."
                                    handleChange={(e) => setData('password_confirmation', e.target.value)}
                                    value={data.password_confirmation}
                                    required={true}/>
                            </div>
                        </div>
                        <div className="grid space-y-[14px] mt-[30px]">
                            <Button type='submit' href={route('prototype.dashboard')} processing={processing}>
                                <span className="text-base font-semibold">
                                    Sign Up
                                </span>
                            </Button>
                            <Link href={route('login')}>
                                <Button variant="light-outline">
                                    <span className="text-base text-white">
                                        Sign In to My Account
                                    </span>
                                </Button>
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </>
}