import {useForm, usePage} from '@inertiajs/inertia-react';
import React, {useEffect, useState} from 'react'
import Base from '../../Layouts/Base'

export default function Profile(props) {
    const {social} = usePage().props;

    const {data, setData, put, reset, errors} = useForm({
        facebook: social.facebook,
        linkedin: social.linkedin,
        instagram: social.instagram,
    });

    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        put(route('social.update', social.id), {
            data,
            onSuccess: () => {

            },
        });
    }


    return (
        <>
            <div>
                <div className="container-fluid py-4">
                    <div className="row">
                        <div className="col-md-8">
                            <div className="card">
                                <form onSubmit={onSubmit}>
                                    <div className="card-body">
                                        <p className="text-uppercase text-sm">{__('About Information')}</p>
                                        <div className="row">
                                            <div className="col-md-12">
                                                <div className="form-group">
                                                    <label htmlFor="name" className="col-form-label">Facebook:</label>
                                                    <input type="text" className="form-control" name='facebook' value={data.facebook} onChange={onChange} id="facebook"/>
                                                    {errors && <div className='text-danger mt-1'>{errors.facebook}</div>}
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="name" className="col-form-label">Instagram:</label>
                                                    <input type="text" className="form-control" name='instagram' value={data.instagram} onChange={onChange} id="instagram"/>
                                                    {errors && <div className='text-danger mt-1'>{errors.instagram}</div>}
                                                </div>
                                                <div className="form-group">
                                                    <label htmlFor="name" className="col-form-label">Linkedin:</label>
                                                    <input type="text" className="form-control" name='linkedin' value={data.linkedin} onChange={onChange} id="linkedin"/>
                                                    {errors && <div className='text-danger mt-1'>{errors.linkedin}</div>}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="card-header pb-0">
                                        <div className="d-flex align-items-center">
                                            <button type='submit' className="btn btn-primary btn-sm ms-auto">
                                                {__('Save')}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </>
    )
}

Profile.layout = (page) => <Base children={page} title={__('Social')}/>

