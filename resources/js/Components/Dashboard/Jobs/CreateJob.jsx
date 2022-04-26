import { useForm } from '@inertiajs/inertia-react'
import React from 'react'

export default function CreateJob({close}) {

    const {data, setData, post, reset, errors} = useForm({ title: '' });

    const onChange = (e) => setData({ ...data, [e.target.id]: e.target.value });

    const onSubmit = (e) => {
        e.preventDefault();
        post(route('jobs.store'), {
            data, 
            onSuccess: () => {
                reset(),
                close()
            }, 
        });
    }

    return (
        <>
            <form onSubmit={onSubmit}>
                <div className="modal-body">
                        <div className="form-group">
                            <label htmlFor="title" className="col-form-label">{__('Title')}:</label>
                            <input type="text" className="form-control" name='title' value={data.name} onChange={onChange} id="title"/>
                            {errors && <div className='text-danger mt-1'>{errors.title}</div>}
                        </div>
                </div>
                <div className="modal-footer">
                    <button type="button" className="btn bg-gradient-secondary" data-bs-dismiss="modal">{__('Close')}</button>
                    <button type="submit" className="btn bg-gradient-primary">{__('Save')}</button>
                </div>
            </form>
        </>

    )
}
