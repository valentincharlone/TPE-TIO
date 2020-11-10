package criterios;

import principal.Elemento;

public class CriterioAnd extends Criterio {
	private Criterio c;
	private Criterio c1;
	
	public CriterioAnd(Criterio c, Criterio c1) {
		this.c = c;
		this.c1 = c1;
	}

	@Override
	public boolean cumple(Elemento e) {
		return c.cumple(e)&&c1.cumple(e);
	}
}
