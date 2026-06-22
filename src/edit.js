import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
    return (
        <div { ...useBlockProps() }>
            <div className="fand_product_customizer-preview-wrapper" style={{ marginBottom: '20px', border: '1px solid #ddd', padding: '15px' }}>
                <h3>{__('Customize your product', 'fand-product-customizer')}</h3>
                
                <label><strong>{__('Your customization *', 'fand-product-customizer')}</strong></label><br />
                
                <input 
                    type="text" 
                    disabled 
                    placeholder={__('Enter text', 'fand-product-customizer')} 
                    style={{ width: '100%' }} 
                />
                
                <div style={{ fontSize: '32px', margin: '15px 0', textAlign: 'center', border: '2px solid #f0f0f0', padding: '20px', backgroundColor: '#fafafa', borderRadius: '8px', color: '#333' }}>
                    {__('Your text here', 'fand-product-customizer')}
                </div>
                
                <label style={{ display: 'block', marginTop: '10px' }}>{__('Choose a font:', 'fand-product-customizer')}</label>
                
                <select disabled style={{ width: '100%' }}>
                    <option>{__('-- Choose a font --', 'fand-product-customizer')}</option>
                </select>
            </div>
        </div>
    );
}